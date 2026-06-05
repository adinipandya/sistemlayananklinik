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

        //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
            //'password' => 'test123'
        //]);

    User::updateOrCreate(
        ['email' => 'ardi@gmail.com'],
        [
            'name' => 'Ardi',
            'password' => bcrypt('dokter123'),
            'role' => 'doctor'
        ]
    );

    User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
    [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]
    );

    User::updateOrCreate(
        ['email' => 'teriardiansyah24@gmail.com'],
        [
            'name' => 'Ardiansyah',
            'password' => bcrypt('ardnsyh11'),
            'role' => 'doctor'
        ]
    );
    }
}
