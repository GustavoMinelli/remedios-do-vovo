<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = new Patient();

        $patient->name = 'João';
        $patient->surname = 'Silva';
        $patient->cpf = '123.456.789-00';
        $patient->birth_date = '1990-01-01';
        $patient->phone = '(11) 99999-9999';
        $patient->email = 'pacienteJoao@teste.com';
        $patient->birth_date = '2004-03-10';
        
        $patient->save();
    
    }
}
