<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\Faculte;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtudiantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etudiant([
            "matricule" => $row['matricule'],
            "nom" => $row['nom'],
            "prenom" => $row['prenom'],
            "email" => $row['email'],
            "adresse" => $row['adresse'],
            "date_de_naissance" => $row['date_de_naissance'],
            "telephone" => $row['telephone'],
            "status" => $row['status'],
            // 'faculte_id' => Faculte::where('nom', $row['faculte_id'])->firstOrFail()->id,
        ]);
    }
}
