<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class consultController extends Controller
{
    public function consultlogin(){
        return view('auth.consultlogin');
    }

    public function consultcreate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:12']
        ]);
        $consultant = Consultant::where('email', '=', $request->email)->first();
        if ($consultant) {
            if (Hash::check($request->password, $consultant->password)) {
                $request->session()->put('loginId', $consultant->consultantId);
                return redirect('consulthome');
            } else {
                return back()->with('fail', 'Password not matches !');
            }
        } else {
            return back()->with('fail', 'This email is not registred !');
        }
    }

    public function consultregister(){
        return view('auth.consultregister');
    }

    public function consultstore(Request $request)
    {
    
      $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Consultant::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'prix' => ['required', 'integer'],
            'adresse' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:555'],
            'specialite' => ['required', 'string', 'max:255'],
            'Photo' => ['required'],
            
        ]);
        
    
        $image = $request->file('Photo');
        $path = Storage::disk('public')->put('/images/consultant/', $image);
        $consultant = new Consultant();
        $consultant->name = $request->name;
        $consultant->email = $request->email;
        $consultant->password = Hash::make($request->password);
        $consultant->prix = $request->prix;
        $consultant->adresse = $request->adresse;
        $consultant->description = $request->description;
        $consultant->specialite = $request->specialite;
        $consultant->image = $path;
        
        $result = $consultant->save();

        if ($result) {
            return back()->with('success', 'You have registred successfuly');
        } else {
            return back()->with('fail', 'Something wrong !');
        }
    }

}
