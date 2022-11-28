<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class NormalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'nom'    => 'Normal',
            'prenom'     => 'User',
            'email'         =>  'user@diagui.com',
            'telephone' =>  '65116446',
            'password'      =>  Hash::make('User@it223#'),
            'role'       => 'user'
        ]);
    }
}
