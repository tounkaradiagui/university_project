<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'date_de_naissance',
        'telephone',
        'status',
        'faculte_id',
        'matricule'
    ];



    public function etudiants()
    {
        return $this->belongsTo(Faculte::class, 'faculte_id' );
    }
}
