<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController
{
    public function dashboard()
    {
        return view('admin.dashboard_admin');
    }

    public function dokter()
    {
        return view('admin.dokter_admin');
    }

    public function pasien()
    {
        return view('admin.pasien_admin');
    }

    public function jadwal()
    {
        return view('admin.jadwal_admin');
    }

    public function obat()
    {
        return view('admin.obat_admin');
    }

    public function resep()
    {
        return view('admin.resep_admin');
    }
}

