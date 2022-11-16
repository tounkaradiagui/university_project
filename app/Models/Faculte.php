<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculte extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'sigle'
    ];

    // public function etudiants()
    // {
    //    return $this->hasMany(Faculte::class, 'faculte_id');
    // }
}
