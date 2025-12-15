<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Consultant extends Model
{
    use HasFactory;
    protected $primaryKey = 'consultantId';
    protected $fillable = [
        'name',
        'email',
        'password',
        'prix',
        'adresse',
        'description',
        'specialite',
        'image'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('message', 'rendez_vous', 'etat');
    }

}
