<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Faculte;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;


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
            "date_de_naissance" => $row['date_de_naissance'],
            "telephone" => $row['telephone'],
            "sexe" => $row['sexe'],
            "statut" => $row['statut'],
            "scolarite" => $row['scolarite'],
            "etablissement" => $row['etablissement'],
            "mention" => $row['mention'],
            "lieu_de_naissance" => $row['lieu_de_naissance'],
        ]);
    }
}
