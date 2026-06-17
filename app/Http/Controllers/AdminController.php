<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Obat;
use App\Models\Notification;
use App\Models\JadwalKonsultasi;

class AdminController extends Controller
{
    // ================= DASHBOARD =================

    public function dashboard()
    {
        // Feedback terbaru
        $feedbackTerbaru = Feedback::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Statistik
        $totalFeedback = Feedback::count();

        $feedbackMenunggu = Feedback::where(
            'status',
            'Menunggu'
        )->count();

        $totalDokter = Dokter::count();

        $totalPasien = User::where(
            'role',
            'pasien'
        )->count();

        $pasienMenunggu = User::where(
            'role',
            'pasien'
        )->where(
            'status',
            'Menunggu'
        )->count();

        // Dokter terbaru
        $dokterTerbaru = Dokter::latest()
            ->take(3)
            ->get();

        // Pasien terbaru
        $pasienTerbaru = User::where(
            'role',
            'pasien'
        )->latest()
         ->take(3)
         ->get();

        // Jadwal hari ini
        $jadwalHariIni = JadwalKonsultasi::with('dokter')
            ->whereDate(
                'tanggal',
                now()->toDateString()
            )
            ->orderBy('jam', 'asc')
            ->take(5)
            ->get();

        // Total jadwal hari ini
        $totalJadwalHariIni = JadwalKonsultasi::whereDate(
            'tanggal',
            now()->toDateString()
        )->count();

        return view('admin.dashboard_admin', compact(
            'feedbackTerbaru',
            'totalFeedback',
            'feedbackMenunggu',
            'totalDokter',
            'totalPasien',
            'pasienMenunggu',
            'dokterTerbaru',
            'pasienTerbaru',
            'jadwalHariIni',
            'totalJadwalHariIni'
        ));
    }

    // ================= PASIEN =================

    public function pasien(Request $request)
    {
        $search = $request->search;

        $pasien = User::where('role', 'pasien')
            ->where('name', 'like', "%$search%")
            ->latest()
            ->get();

        $totalPasien = User::where(
            'role',
            'pasien'
        )->count();

        $pasienAktif = User::where(
            'role',
            'pasien'
        )->where(
            'status',
            'Aktif'
        )->count();

        $menungguVerifikasi = User::where(
            'role',
            'pasien'
        )->where(
            'status',
            'Menunggu'
        )->count();

        $profilBelumLengkap = User::where(
            'role',
            'pasien'
        )->whereNull(
            'tanggal_lahir'
        )->count();

        return view('admin.pasien_admin', compact(
            'pasien',
            'totalPasien',
            'pasienAktif',
            'menungguVerifikasi',
            'profilBelumLengkap'
        ));
    }

    public function storePasien(Request $request)
    {
        Pasien::create([
            'nama'   => $request->nama,
            'umur'   => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien')
            ->with(
                'success',
                'Pasien berhasil ditambahkan'
            );
    }

    public function updatePasien(
        Request $request,
        $id
    ) {
        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama'   => $request->nama,
            'umur'   => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien')
            ->with(
                'success',
                'Pasien berhasil diupdate'
            );
    }

    public function destroyPasien($id)
    {
        Pasien::findOrFail($id)->delete();

        return redirect('/admin/pasien')
            ->with(
                'success',
                'Pasien berhasil dihapus'
            );
    }

    // ================= DOKTER =================

    public function dokter(Request $request)
    {
        $search = $request->search;

        $dokters = Dokter::where(
            'nama',
            'like',
            "%$search%"
        )->latest()->get();

        return view(
            'admin.dokter_admin',
            compact('dokters')
        );
    }

    public function storeDokter(
        Request $request
    ) {
        Dokter::create([
            'nama'      => $request->nama,
            'no_sip'    => $request->sip,
            'spesialis' => $request->spesialis,
            'no_hp'     => $request->no_hp,
            'email'     => $request->email,
            'status'    => 'Aktif'
        ]);

        return back()->with(
            'success',
            'Dokter berhasil ditambahkan'
        );
    }

    public function updateDokter(
        Request $request,
        $id
    ) {
        $dokter = Dokter::findOrFail($id);

        $dokter->update([
            'nama'      => $request->nama,
            'spesialis' => $request->spesialis,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect('/admin/dokter')
            ->with(
                'success',
                'Dokter berhasil diupdate'
            );
    }

    public function destroyDokter($id)
    {
        Dokter::findOrFail($id)->delete();

        return redirect('/admin/dokter')
            ->with(
                'success',
                'Dokter berhasil dihapus'
            );
    }

    // ================= MENU ADMIN =================

    public function jadwal()
{
    // Ambil semua jadwal beserta relasi dokter dan pasien
    $jadwals = JadwalKonsultasi::with([
        'dokter',
        'pasien'
    ])
    ->orderBy('tanggal', 'asc')
    ->orderBy('jam', 'asc')
    ->get();

    // Statistik
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

    // Data untuk dropdown modal
    $dokters = Dokter::all();

    $pasiens = User::where(
        'role',
        'pasien'
    )->get();

    return view(
        'admin.jadwal_admin',
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

    public function obat()
    {
        $obat = Obat::latest()->get();

        $totalObat = $obat->count();

        $stokAman = $obat->where(
            'stok',
            '>',
            20
        )->count();

        $stokMenipis = $obat->whereBetween(
            'stok',
            [1, 20]
        )->count();

        $stokHabis = $obat->where(
            'stok',
            0
        )->count();

        return view(
            'admin.obat_admin',
            compact(
                'obat',
                'totalObat',
                'stokAman',
                'stokMenipis',
                'stokHabis'
            )
        );
    }

    public function resep()
    {
        return view('admin.resep_admin');
    }

    public function feedback()
    {
        $feedback = Feedback::with('user')
            ->latest()
            ->get();

        return view(
            'admin.feedback',
            compact('feedback')
        );
    }

    public function updateFeedback(
        Request $request,
        $id
    ) {
        $feedback = Feedback::findOrFail($id);

        $feedback->update([
            'respon' => $request->respon,
            'status' => 'Direspon'
        ]);

        Notification::create([
            'user_id' => $feedback->user_id,
            'judul'   => 'Feedback Direspon',
            'pesan'   => 'Admin telah membalas feedback Anda'
        ]);

        return back()->with(
            'success',
            'Feedback berhasil direspon'
        );
    }

    public function verifikasiPasien($id)
    {
        $pasien = User::findOrFail($id);

        $pasien->update([
            'status' => 'Aktif'
        ]);

        Notification::create([
            'user_id' => $pasien->id,
            'judul'   => 'Akun Diverifikasi',
            'pesan'   => 'Akun Anda telah aktif'
        ]);

        return back()->with(
            'success',
            'Pasien berhasil diverifikasi'
        );
    }

    public function storeObat(
        Request $request
    ) {
        Obat::create([
            'nama_obat'  => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'stok'       => $request->stok,
            'harga'      => $request->harga,
            'deskripsi'  => $request->deskripsi
        ]);

        return back()->with(
            'success',
            'Obat berhasil ditambahkan'
        );
    }

    public function updateObat(
        Request $request,
        $id
    ) {
        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat'  => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'stok'       => $request->stok,
            'harga'      => $request->harga,
            'deskripsi'  => $request->deskripsi
        ]);

        return back()->with(
            'success',
            'Data obat berhasil diperbarui'
        );
    }

    public function destroyObat($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return back()->with(
            'success',
            'Data obat berhasil dihapus'
        );
    }
}