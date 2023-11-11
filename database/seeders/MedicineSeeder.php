<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $medicine = new Medicine();

        $medicine->name = 'Dipirona';
        $medicine->type = 'Comprimido';

        $medicine->save();
    }
}