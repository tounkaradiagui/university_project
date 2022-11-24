<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_de_naissance',
        'lieu_de_naissance',
        'age',
        'adresse',
        'email',
        'telephone',
        'statut',
        'etat_candidat',
        'niveau',
        'semestre',
        'faculte',
        'filiere',
        'diplome',
        'annee',
        'numero_de_place',
        'scolarite',
        'etablissement',
        'resultat',
        'mention',
        'matricule_def',
        'annee_def',
        'serie',
        'academie',
        'residence',
        'nom_pere',
        'profession_pere',
        'residence_pere',
        'telephone_pere',
        'nom_mere',
        'prenom_mere',
        'residence_mere',
        'profession_mere',
        'telephone_mere',
    ];



    // public function facultes()
    // {
    //     return $this->belongsTo(Etudiant::class, 'faculte_id' );
    // }
}




