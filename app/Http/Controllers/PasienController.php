<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController
{
    public function dashboard()
    {
        return view('pasien.dashboard_pasien');
    }

    public function booking()
    {
        return view('pasien.booking');
    }
    public function simpanBooking(Request $request)
    {
{
    DB::table('bookings')->insert([
        'dokter' => $request->dokter,
        'spesialis' => $request->spesialis,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'status' => 'Menunggu',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/pasien/booking')
        ->with('success', 'Booking berhasil dibuat');
}
    }
    public function jadwal()
    {
        return view('pasien.jadwal_pasien');
    }

    public function profile()
    {
        return view('pasien.profile');
    }

    public function feedback()
    {
        return view('pasien.feedback');
    }

     public function rekam_medis()
    {
        return view('pasien.rekam_medis');
    }
       public function riwayat_konsultasi()
    {
        return view('pasien.riwayat_konsultasi');
    }
}