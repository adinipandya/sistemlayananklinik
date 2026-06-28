<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Notification;


class AdminController
{


    public function dokter()
    {
        $dokter = Dokter::latest()->get();

        return view(
            'admin.dokter_admin',
            compact('dokter')
        );
    }

    public function pasien()
    {
        $pasien = User::where(
            'role',
            'pasien'
        )->latest()->get();

        $totalPasien = User::where(
            'role',
            'pasien'
        )->count();

        $pasienAktif = User::where(
            'role',
            'pasien'
        )
            ->where(
                'status',
                'Aktif'
            )
            ->count();

        $menungguVerifikasi = User::where(
            'role',
            'pasien'
        )
            ->where(
                'status',
                'Menunggu'
            )
            ->count();

        $profilBelumLengkap = User::where(
            'role',
            'pasien'
        )
            ->whereNull(
                'tanggal_lahir'
            )
            ->count();

        return view(
            'admin.pasien_admin',
            compact(
                'pasien',
                'totalPasien',
                'pasienAktif',
                'menungguVerifikasi',
                'profilBelumLengkap'
            )
        );
    }

    public function jadwal()
    {
        return view('admin.jadwal_admin');
    }

    public function obat()
    {
        $obat = Obat::latest()->get();

        $totalObat = $obat->count();

        $stokAman = $obat
            ->where('stok', '>', 20)
            ->count();

        $stokMenipis = $obat
            ->whereBetween('stok', [1, 20])
            ->count();

        $stokHabis = $obat
            ->where('stok', 0)
            ->count();

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

    public function updateFeedback(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $feedback->update([

            'respon' => $request->respon,

            'status' => 'Direspon'

        ]);
        Notification::create([

            'user_id' => $feedback->user_id,

            'judul' => 'Feedback Direspon',

            'pesan' => 'Admin telah membalas feedback Anda'

        ]);

        return back()->with(
            'success',
            'Feedback berhasil direspon'
        );
    }

    public function dashboard()
    {
        $feedbackTerbaru = Feedback::with('user')
            ->latest()
            ->take(5)
            ->get();

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
        )
            ->where(
                'status',
                'Menunggu'
            )
            ->count();

        return view(
            'admin.dashboard_admin',
            compact(
                'feedbackTerbaru',
                'totalFeedback',
                'feedbackMenunggu',
                'totalDokter',
                'totalPasien',
                'pasienMenunggu'
            )
        );
    }
    public function storeDokter(Request $request)
    {
        $request->validate([

            'nama'      => 'required',
            'nik'       => 'required|digits:16|unique:dokters,nik',
            'email'     => 'required|email|unique:dokters,email',
            'no_str'    => 'required|unique:dokters,no_str',
            'no_sip'    => 'required|unique:dokters,sip',
            'spesialis' => 'required',
            'no_hp'     => 'required',
            'password'  => 'required|min:8'

        ]);

        User::create([
            'name' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'dokter',
            'status' => 'Aktif'
        ]);

        Dokter::create([

            'nama'      => $request->nama,
            'nik'       => $request->nik,
            'email'     => $request->email,
            'no_str'    => $request->no_str,
            'sip'       => $request->no_sip,
            'spesialis' => $request->spesialis,
            'no_hp'     => $request->no_hp,
            'password'  => bcrypt($request->password),
            'status'    => 'Aktif'

        ]);

        return back()->with(
            'success',
            'Dokter berhasil ditambahkan'
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

            'judul' => 'Akun Diverifikasi',

            'pesan' => 'Akun Anda telah aktif'

        ]);

        return back()->with(
            'success',
            'Pasien berhasil diverifikasi'
        );
    }

    public function storeObat(Request $request)
    {
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

    public function updateObat(Request $request, $id)
    {

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

        $obat->delete();

        return back()->with(
            'success',
            'Data obat berhasil dihapus'
        );
    }
}
