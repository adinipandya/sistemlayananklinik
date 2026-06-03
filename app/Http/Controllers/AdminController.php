<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;

class AdminController extends Controller
{
    // ================= DASHBOARD =================

    public function dashboard()
    {
        return view('admin.dashboard_admin');
    }

    // ================= PASIEN =================

    public function pasien(Request $request)
    {
        $search = $request->search;

        $pasiens = Pasien::where('nama', 'like', "%$search%")
                    ->get();

        return view('admin.pasien_admin', compact('pasiens'));
    }

    public function storePasien(Request $request)
    {
        Pasien::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien');
    }

    public function updatePasien(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien');
    }

    public function destroyPasien($id)
    {
        Pasien::findOrFail($id)->delete();

        return redirect('/admin/pasien');
    }

    // ================= DOKTER =================

    public function dokter(Request $request)
    {
        $search = $request->search;

        $dokters = Dokter::where('nama', 'like', "%$search%")
                    ->get();

        return view('admin.dokter_admin', compact('dokters'));
    }

    public function storeDokter(Request $request)
    {
        Dokter::create([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'telepon' => $request->telepon,
        ]);

        return redirect('/admin/dokter')
                ->with('success', 'Dokter berhasil ditambahkan');
    }

    public function updateDokter(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $dokter->update([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'telepon' => $request->telepon,
        ]);

        return redirect('/admin/dokter')
                ->with('success', 'Dokter berhasil diupdate');
    }

    public function destroyDokter($id)
    {
        Dokter::findOrFail($id)->delete();

        return redirect('/admin/dokter')
                ->with('success', 'Dokter berhasil dihapus');
    }

    // ================= MENU ADMIN =================

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
