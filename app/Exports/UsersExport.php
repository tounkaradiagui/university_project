<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::where();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Email',
            'Téléphone',
            'Status',
            'Role'
        ];
    }

    public function map($row):array
    {
        return[
            $row->nom,
            $row->prenom,
            $row->email,
            $row->telephone,
            $row->status ? 'Actif' : 'Inactif',
            $row->role
        ];
    }
}
