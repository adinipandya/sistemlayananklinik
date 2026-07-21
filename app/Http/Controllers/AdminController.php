<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Obat;
use App\Models\Notification;
use App\Models\JadwalKonsultasi;
use App\Models\RekamMedis;

class AdminController extends Controller
{
    // ================= DASHBOARD =================

    public function dashboard()
    {
        $feedbackTerbaru = Feedback::with('user')
            ->latest()
            ->take(5)
            ->get();

        $totalFeedback = Feedback::count();

        $feedbackMenunggu = Feedback::where('status', 'Menunggu')->count();

        $totalDokter = Dokter::count();

        $totalPasien = User::where('role', 'pasien')->count();

        $pasienMenunggu = User::where('role', 'pasien')
            ->where('status', 'Menunggu')
            ->count();

        $dokterTerbaru = Dokter::latest()->take(3)->get();

        $pasienTerbaru = User::where('role', 'pasien')
            ->latest()
            ->take(3)
            ->get();

        $jadwalHariIni = JadwalKonsultasi::with('dokter')
            ->whereDate('tanggal', now()->toDateString())
            ->orderBy('jam', 'asc')
            ->take(5)
            ->get();

        $totalJadwalHariIni = JadwalKonsultasi::whereDate('tanggal', now()->toDateString())->count();

        $aktivitasSistem = Notification::with('user')
            ->latest()
            ->take(8)
            ->get();

        $pasienMenungguVerifikasi = User::where('role', 'pasien')
            ->where('status', 'Menunggu')
            ->latest()
            ->take(5)
            ->get();

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
            'totalJadwalHariIni',
            'aktivitasSistem',
            'pasienMenungguVerifikasi'
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

        $totalPasien        = User::where('role', 'pasien')->count();
        $pasienAktif        = User::where('role', 'pasien')->where('status', 'Aktif')->count();
        $menungguVerifikasi = User::where('role', 'pasien')->where('status', 'Menunggu')->count();
        $profilBelumLengkap = User::where('role', 'pasien')->whereNull('tanggal_lahir')->count();

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

        return redirect('/admin/pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function updatePasien(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update([
            'nama'   => $request->nama,
            'umur'   => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/pasien')->with('success', 'Pasien berhasil diupdate');
    }

    public function destroyPasien($id)
    {
        Pasien::findOrFail($id)->delete();

        return redirect('/admin/pasien')->with('success', 'Pasien berhasil dihapus');
    }

    // ================= DOKTER =================

    public function dokter(Request $request)
    {
        $search  = $request->search;
        $dokters = Dokter::where('nama', 'like', "%$search%")->latest()->get();

        return view('admin.dokter_admin', compact('dokters'));
    }

    public function storeDokter(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|digits:16|unique:dokters,nik|unique:users,nik',
            'email'         => 'required|email|unique:dokters,email|unique:users,email',
            'no_str'        => 'required|unique:dokters,no_str',
            'no_sip'        => 'required|unique:dokters,sip',
            'spesialis'     => 'required',
            'no_hp'         => 'required',
            'hari_praktek'  => 'required|string|max:255',
            'jam_praktek'   => 'required|string|max:255',
            'password'      => 'required|min:8'
        ]);

        User::create([
            'name'          => $request->nama,
            'nik'           => $request->nik,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'password'      => bcrypt($request->password),
            'role'          => 'dokter',
            'status'        => 'Aktif',
            'hari_praktek'  => $request->hari_praktek,
            'jam_praktek'   => $request->jam_praktek,
        ]);

        Dokter::create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'email'         => $request->email,
            'no_str'        => $request->no_str,
            'sip'           => $request->no_sip,
            'spesialis'     => $request->spesialis,
            'no_hp'         => $request->no_hp,
            'password'      => bcrypt($request->password),
            'status'        => 'Aktif',
            'hari_praktek'  => $request->hari_praktek,
            'jam_praktek'   => $request->jam_praktek,
        ]);

        return back()->with('success', 'Dokter berhasil ditambahkan');
    }

    public function updateDokter(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $akunDokter = User::where('role', 'dokter')
            ->where(function ($query) use ($dokter) {
                $query->where('nik', $dokter->nik)
                    ->orWhere('email', $dokter->email);
            })
            ->first();

        $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                Rule::unique('dokters', 'email')->ignore($dokter->id),
                Rule::unique('users', 'email')->ignore($akunDokter?->id),
            ],
            'no_str'        => [
                'required',
                Rule::unique('dokters', 'no_str')->ignore($dokter->id),
            ],
            'no_sip'        => [
                'required',
                Rule::unique('dokters', 'sip')->ignore($dokter->id),
            ],
            'spesialis'     => 'required',
            'no_hp'         => 'required',
            'hari_praktek'  => 'required|string|max:255',
            'jam_praktek'   => 'required|string|max:255',
            'status'        => 'required',
            'password'      => 'nullable|min:8',
        ]);

        $dataDokter = [
            'nama'          => $request->nama,
            'email'         => $request->email,
            'no_str'        => $request->no_str,
            'sip'           => $request->no_sip,
            'spesialis'     => $request->spesialis,
            'no_hp'         => $request->no_hp,
            'status'        => $request->status,
            'hari_praktek'  => $request->hari_praktek,
            'jam_praktek'   => $request->jam_praktek,
        ];

        $dataUser = [
            'name'          => $request->nama,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'status'        => $request->status,
            'hari_praktek'  => $request->hari_praktek,
            'jam_praktek'   => $request->jam_praktek,
        ];

        if ($request->filled('password')) {
            $dataDokter['password'] = bcrypt($request->password);
            $dataUser['password'] = bcrypt($request->password);
        }

        $dokter->update($dataDokter);

        if ($akunDokter) {
            $akunDokter->update($dataUser);
        }

        return redirect('/admin/dokter')->with('success', 'Dokter berhasil diupdate');
    }

    public function destroyDokter($id)
    {
        Dokter::findOrFail($id)->delete();

        return redirect('/admin/dokter')->with('success', 'Dokter berhasil dihapus');
    }

    // ================= JADWAL =================

    public function jadwal()
    {
        $jadwals = JadwalKonsultasi::with(['dokter', 'pasien'])
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam', 'asc')
            ->get();

        $totalJadwal = JadwalKonsultasi::count();
        $hariIni     = JadwalKonsultasi::whereDate('tanggal', now()->toDateString())->count();
        $menunggu    = JadwalKonsultasi::where('status', 'Menunggu')->count();
        $selesai     = JadwalKonsultasi::where('status', 'Selesai')->count();
        $dokters     = Dokter::all();
        $pasiens     = User::where('role', 'pasien')->get();

        return view('admin.jadwal_admin', compact(
            'jadwals',
            'totalJadwal',
            'hariIni',
            'menunggu',
            'selesai',
            'dokters',
            'pasiens'
        ));
    }

    public function updateStatusJadwal(Request $request, $id)
    {
        $jadwal = JadwalKonsultasi::findOrFail($id);
        $jadwal->update(['status' => $request->status]);

        Notification::create([
            'user_id' => $jadwal->user_id,
            'judul'   => 'Status Jadwal Diperbarui',
            'pesan'   => 'Jadwal konsultasi kamu telah ' . $request->status,
        ]);

        return back()->with('success', 'Status jadwal berhasil diperbarui');
    }

    public function destroyJadwal($id)
    {
        JadwalKonsultasi::findOrFail($id)->delete();
        return back()->with('success', 'Jadwal berhasil dihapus');
    }

    // ================= OBAT =================

    public function obat()
    {
        $obat        = Obat::latest()->get();
        $totalObat   = $obat->count();
        $stokAman    = $obat->where('stok', '>', 20)->count();
        $stokMenipis = $obat->whereBetween('stok', [1, 20])->count();
        $stokHabis   = $obat->where('stok', 0)->count();

        return view('admin.obat_admin', compact('obat', 'totalObat', 'stokAman', 'stokMenipis', 'stokHabis'));
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

        return back()->with('success', 'Obat berhasil ditambahkan');
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

        return back()->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroyObat($id)
    {

        return back()->with('success', 'Data obat berhasil dihapus');
    }

    // ================= RESEP =================

    public function resep()
    {
        return view('admin.resep_admin');
    }

    // ================= FEEDBACK =================

    public function feedback()
    {
        $feedback = Feedback::with('user')->latest()->get();

        return view('admin.feedback', compact('feedback'));
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
            'judul'   => 'Feedback Direspon',
            'pesan'   => 'Admin telah membalas feedback Anda'
        ]);

        return back()->with('success', 'Feedback berhasil direspon');
    }

    // ================= VERIFIKASI PASIEN =================

    public function verifikasiPasien($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->update(['status' => 'Aktif']);

        Notification::create([
            'user_id' => $pasien->id,
            'judul'   => 'Akun Diverifikasi',
            'pesan'   => 'Akun Anda telah aktif'
        ]);

        return back()->with('success', 'Pasien berhasil diverifikasi');
    }

    // ================= PENGATURAN =================

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }

    public function updatePengaturan(Request $request)
    {
        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateFoto(Request $request)
    {
        $request->validate(['foto' => 'required|image|max:2048']);

        $path = $request->file('foto')->store('foto_profil', 'public');

        auth()->user()->update(['foto' => $path]);

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function passwordPage()
    {
        return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        if ($request->password_baru !== $request->password_konfirmasi) {
            return back()->with('error', 'Konfirmasi password tidak cocok.');
        }

        $user->update([
            'password' => Hash::make($request->password_baru),
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}
