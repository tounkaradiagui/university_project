<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
            'nom'    => 'Super',
            'prenom'     => 'Admin',
            'email'         =>  'admin@diagui.com',
            'telephone' =>  '76292270',
            'password'      =>  Hash::make('Diagui@it223#'),
            'role'       => 'admin'
        ]);

        
    }
}
