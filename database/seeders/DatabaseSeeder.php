<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create([
            'name' => 'Ardi',
            'email' => 'ardi@gmail.com',
            'password' => bcrypt('dokter123'),
            'role' => 'doctor'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Admin Ihsan',
            'email' => 'adminihsan@gmail.com',
            'password' => bcrypt('ihsan123'),
            'role' => 'admin'
        ]);
    }
}
