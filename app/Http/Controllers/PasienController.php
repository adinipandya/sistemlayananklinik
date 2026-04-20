<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}