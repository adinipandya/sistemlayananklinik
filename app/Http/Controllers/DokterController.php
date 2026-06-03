<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class DokterController extends Controller
{
    // ======================================================
    // DASHBOARD DOKTER
    // ======================================================

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

    // ======================================================
    // DATA PASIEN DOKTER
    // ======================================================

    public function pasien()
    {
        $pasiens = Pasien::all();

        return view('dokter.pasien_dokter', compact('pasiens'));
    }

    // SEARCH PASIEN
    public function searchPasien(Request $request)
    {
        $search = $request->search;

        $pasiens = Pasien::where('nama', 'like', '%' . $search . '%')
                    ->get();

        return view('dokter.pasien_dokter', compact('pasiens'));
    }

    // ======================================================
    // KELOLA REKAM MEDIS
    // ======================================================

    public function kelola()
    {
        return view('dokter.kelola_rekam');
    }
}