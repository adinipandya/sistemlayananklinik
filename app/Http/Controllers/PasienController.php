<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    // ======================================================
    // PASIEN
    // ======================================================

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

    // ======================================================
    // ADMIN KELOLA PASIEN
    // ======================================================

    // TAMPILKAN DATA PASIEN
    public function index()
    {
        $pasiens = Pasien::all();

        return view('admin.pasien_admin', compact('pasiens'));
    }

    // TAMBAH PASIEN
    public function store(Request $request)
    {
        Pasien::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien')
                ->with('success', 'Data pasien berhasil ditambahkan');
    }

    // UPDATE PASIEN
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);

        $pasien->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien')
                ->with('success', 'Data pasien berhasil diupdate');
    }

    // HAPUS PASIEN
    public function destroy($id)
    {
        $pasien = Pasien::find($id);

        $pasien->delete();

        return redirect('/admin/pasien')
                ->with('success', 'Data pasien berhasil dihapus');
    }

    // SEARCH PASIEN
    public function search(Request $request)
    {
        $search = $request->search;

        $pasiens = Pasien::where('nama', 'like', '%' . $search . '%')
                    ->get();

        return view('admin.pasien_admin', compact('pasiens'));
    }
}