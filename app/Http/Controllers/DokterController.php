<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController
{
    public function dashboard()
    {
        return view('dokter.dashboard_dokter');
    }

    public function jadwal()
    {
        return view('dokter.jadwal_dokter');
    }

    public function konsultasi()
    {
        return view('dokter.konsultasi');
    }

    public function pasien()
    {
        return view('dokter.pasien_dokter');
    }
}
