<?php

namespace App\Models;

use App\Models\Consultant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $primaryKey = 'userId';
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];
    public function consultants()
    {
        return $this->belongsToMany(Consultant::class)->withPivot('message', 'rendez_vous', 'etat');
    }
}
