<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Seeder de usuário
        $this->call(UserSeeder::class);

        //Seeder de paciente
        $this->call(PatientSeeder::class);
    }
}
