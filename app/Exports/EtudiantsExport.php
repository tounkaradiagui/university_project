<?php

namespace App\Exports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EtudiantsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Etudiant::query();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Sexe',
            'Date de Naissance',
            'Age',
            'Lieu de Naissance',
            'Téléphone',
            'Email',
            'Adresse',
            'Faculté',
            'Niveau',
            'Semestre',
            'Filière',
            'Résidence'
        ];
    }

    public function map($row):array
    {
        return[
            $row->nom,
            $row->prenom,
            $row->sexe,
            $row->date_de_naissance,
            $row->age,
            $row->lieu_de_naissance,
            $row->telephone,
            $row->email,
            $row->adresse,
            $row->faculte,
            $row->niveau,
            $row->semestre,
            $row->filiere,
            $row->residence,
        ];
    }
}
