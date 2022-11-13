<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([

            "nom" => $row['nom'],
            "prenom" => $row['prenom'],
            "email" => $row['email'],
            "telephone" => $row['telephone'],
            "role" => 'admin', // User Type User
            "status" => 1,
            "password" => Hash::make('password')
        ]);
    }
}
