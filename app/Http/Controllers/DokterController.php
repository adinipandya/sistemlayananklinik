<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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

    public function profile()
    {
        return view('dokter.profile');
    }

    public function password()
    {
        return view('dokter.password');
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('photo')) {

        if ($user->photo) {

            Storage::disk('public')
                ->delete($user->photo);
        }

        $user->photo =
            $request->file('photo')
                ->store('profile', 'public');
    }

    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    return back()->with(
        'success',
        'Profil berhasil diperbarui'
    );
}

public function datapasien(Request $request)
{
    $search = $request->search;

    $pasien = User::where('role', 'patient')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->get();

    return view('dokter.data_pasien', compact(
        'pasien',
        'search'
    ));
}

public function deletePhoto()
{
    $user = Auth::user();

    if ($user->photo) {

        Storage::disk('public')
            ->delete($user->photo);

        $user->photo = null;

        $user->save();
    }

    return back()->with(
        'success',
        'Foto profil berhasil dihapus'
    );
}
}