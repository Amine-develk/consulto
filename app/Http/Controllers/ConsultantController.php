<?php

namespace App\Http\Controllers;

use session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Consultant;
use Illuminate\Http\Request;


class ConsultantController extends Controller
{

public function sendRequest(Request $request)
{
    $request->validate([
        'consultant_id' => 'required|exists:consultants,consultantId',
        'message' => 'required|string',
    ]);

    $user = User::find(session()->get('loginId'));
    if (!$user) {
        return redirect()->back()->with('error', 'User not authenticated.');
    }

    $consultant = Consultant::find($request->consultant_id);
    if (!$consultant) {
        return redirect()->back()->with('error', 'Consultant not found.');
    }

    $user->consultants()->attach($consultant, ['message' => $request->message, 'etat' => 'envoyé']);

    return redirect()->back()->with('success', 'Consultation request sent successfully.');
}

public function acceptRequest(Request $request){

    $consultantId = session()->get('loginId');
    $consultant = Consultant::find($consultantId);
    if (!$consultant) {
        return redirect()->back()->with('error', 'Consultant not authenticated.');
    }

    $pivotRecords = $consultant->users()->wherePivot('etat', 'envoyé')->get();

    foreach ($pivotRecords as $pivotRecord) {
        $pivotRecord->pivot->etat = 'accepté';
        $pivotRecord->pivot->rendez_vous = date('Y-m-d H:i:s', strtotime($request->date));
        $pivotRecord->pivot->save();
    }

    return redirect()->back()->with('success', 'Consultation request accepted.');
}






    public function welcome(){
        $consultant = Consultant::all();
        return view('welcome', compact('consultant'));
    }

    public function home(){
        $consultant = Consultant::all();
        return view('home', compact('consultant'));
    }

    public function consulthome(){
        $consultant = Consultant::all();
        return view('consulthome', compact('consultant'));
    }
    
    public function profile(){
    $consultant = Consultant::find(session()->get('loginId'));
    $users = $consultant->users()->withPivot('message', 'etat', 'rendez_vous')->get();
    return view('profile', compact('consultant', 'users'));
    }

    public function espace(){
    $user = User::find(session()->get('loginId'));
    $consultants = $user->consultants()->withPivot('message', 'etat', 'rendez_vous')->get();
    return view('espace', compact('user', 'consultants'));
    }
}
