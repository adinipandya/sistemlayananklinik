<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        Dokter::create([
            'nama' => 'Dr. Ardi',
            'sip' => 'SIP-2026-001',
            'spesialis' => 'Umum',
            'no_hp' => '08123456789',
            'status' => 'Aktif'
        ]);

        Dokter::create([
            'nama' => 'Dr. Dini',
            'sip' => 'SIP-2026-002',
            'spesialis' => 'Gigi',
            'no_hp' => '08129876543',
            'status' => 'Aktif'
        ]);
    }
}