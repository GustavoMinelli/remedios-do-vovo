<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('remedios'),
        ]);

        $names = [
           'Gustavo', 'Iure',
        ];

        foreach ($names as $name) {
            User::factory()->create([
                'name' => $name,
                'email' => mb_strtolower($name) . '@gmail.com',
                'password' => bcrypt('remedios'),
            ]);
        }

        User::factory(2)->create();

    }
}
