<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index)
        {
            DB::table('etudiants')->insert([
                'nom' => $faker->firstname,
                'prenom' => $faker->lastname,
                'date_de_naissance' => $faker->date,
                'etat_candidat' => 'non_inscrit',
                'email' => $faker->unique()->safeEmail,
                'adresse' => $faker->address,
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month')
            ]);
        }


        $this->call([
            AdminSeeder::class,
            NormalUserSeeder::class
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
