<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKonsultasi;
use App\Models\Dokter;
use App\Models\User;

class JadwalKonsultasiController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKonsultasi::with(['dokter', 'pasien'])
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam', 'asc')
            ->get();

        $totalJadwal = JadwalKonsultasi::count();

        $hariIni = JadwalKonsultasi::whereDate(
            'tanggal',
            now()->toDateString()
        )->count();

        $menunggu = JadwalKonsultasi::where(
            'status',
            'Menunggu'
        )->count();

        $selesai = JadwalKonsultasi::where(
            'status',
            'Selesai'
        )->count();

        $dokters = Dokter::all();

        $pasiens = User::where('role', 'pasien')->get();

        return view(
            'jadwal_admin',
            compact(
                'jadwals',
                'totalJadwal',
                'hariIni',
                'menunggu',
                'selesai',
                'dokters',
                'pasiens'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'dokter_id' => 'required|exists:dokters,id',
            'user_id' => 'required|exists:users,id',
            'keluhan' => 'required'
        ]);

        JadwalKonsultasi::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'dokter_id' => $request->dokter_id,
            'user_id' => $request->user_id,
            'keluhan' => $request->keluhan,
            'status' => 'Menunggu'
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }
}