<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\JadwalKonsultasi;
use App\Models\RekamMedis;
use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\Notification;

class DokterController extends Controller
{
    // ======================================================
    // DASHBOARD DOKTER
    // ======================================================

    public function dashboard()
    {
        $pasienHariIni = JadwalKonsultasi::whereDate(
            'tanggal',
            today()
        )->count();

        $jadwalHariIni = JadwalKonsultasi::whereDate(
            'tanggal',
            today()
        )->count();

        $konsultasiAktif = JadwalKonsultasi::where(
            'status',
            'Disetujui'
        )->count();

        $totalRekamMedis = RekamMedis::count();

        $jadwalHariIniList = JadwalKonsultasi::with([
            'pasien'
        ])
            ->whereDate(
                'tanggal',
                today()
            )
            ->orderBy('jam')
            ->get();

        return view(
            'dokter.dashboard_dokter',
            compact(
                'pasienHariIni',
                'jadwalHariIni',
                'konsultasiAktif',
                'totalRekamMedis',
                'jadwalHariIniList'
            )
        );
    }

    public function jadwal()
    {
        $jadwal = JadwalKonsultasi::with([
            'pasien',
            'dokter'
        ])
            ->whereDate(
                'tanggal',
                '>=',
                today()
            )
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam', 'asc')
            ->get();

        $totalJadwal = $jadwal->count();

        $totalMenunggu = $jadwal
            ->where('status', 'Menunggu')
            ->count();

        $totalSelesai = $jadwal
            ->where('status', 'Selesai')
            ->count();

        $totalDisetujui = $jadwal
            ->where('status', 'Disetujui')
            ->count();

        $pasienBerikutnya = $jadwal
            ->where('status', 'Menunggu')
            ->first();

        return view(
            'dokter.jadwal_dokter',
            compact(
                'jadwal',
                'totalJadwal',
                'totalMenunggu',
                'totalSelesai',
                'totalDisetujui',
                'pasienBerikutnya'
            )
        );
    }

    public function konsultasi($id)
    {
        $jadwal = JadwalKonsultasi::with([
            'pasien',
            'dokter'
        ])->findOrFail($id);

        $obat = Obat::orderBy('nama_obat')->get();

        $antrian = JadwalKonsultasi::with('pasien')
            ->where('dokter_id', auth()->id())
            ->whereDate('tanggal', today())
            ->orderBy('tanggal')
            ->get();

        return view('dokter.konsultasi', compact(
            'jadwal',
            'obat',
            'antrian'
        ));
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
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter'
        ])
            ->latest()
            ->get();

        $totalRekam = $rekamMedis->count();

        $rekamHariIni = $rekamMedis
            ->where('created_at', '>=', now()->startOfDay())
            ->count();

        return view(
            'dokter.kelola_rekam',
            compact(
                'rekamMedis',
                'totalRekam',
                'rekamHariIni'
            )
        );
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

            $user->photo = $request
                ->file('photo')
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
        $pasienHariIni = JadwalKonsultasi::whereDate(
            'tanggal',
            today()
        )->count();

        $pasienBaru = User::where(
            'role',
            'pasien'
        )
            ->whereMonth(
                'created_at',
                now()->month
            )
            ->count();

        $kunjunganBulanIni = JadwalKonsultasi::whereMonth(
            'tanggal',
            now()->month
        )->count();

        $search = $request->search;

        $pasien = User::where('role', 'pasien')
            ->when($search, function ($query) use ($search) {
                $query->where(
                    'name',
                    'like',
                    "%{$search}%"
                );
            })
            ->get();

        return view(
            'dokter.data_pasien',
            compact(
                'pasien',
                'search',
                'pasienHariIni',
                'pasienBaru',
                'kunjunganBulanIni'
            )
        );
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

    public function resep()
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'resepObat'
        ])
            ->latest()
            ->get();

        $totalResep = $rekamMedis->count();

        $resepHariIni = $rekamMedis
            ->where('created_at', '>=', now()->startOfDay())
            ->count();

        $resepMingguIni = $rekamMedis
            ->where('created_at', '>=', now()->startOfWeek())
            ->count();

        $resepBulanIni = $rekamMedis
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();

        return view(
            'dokter.resep_obat',
            compact(
                'rekamMedis',
                'totalResep',
                'resepHariIni',
                'resepMingguIni',
                'resepBulanIni'
            )
        );
    }

    public function detailResep($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat.obat'
        ])->findOrFail($id);

        return view(
            'dokter.detail_resep',
            compact('rekamMedis')
        );
    }

    public function batalkanJadwal($id)
    {
        $jadwal = JadwalKonsultasi::findOrFail($id);

        $jadwal->update([
            'status' => 'Dibatalkan'
        ]);

        return back()->with(
            'success',
            'Jadwal berhasil dibatalkan'
        );
    }

    public function simpanRekamMedis(
        Request $request,
        $id
    ) {
        $jadwal = JadwalKonsultasi::findOrFail($id);

        $rekamMedis = RekamMedis::create([

            'jadwal_konsultasi_id' => $jadwal->id,

            'tekanan_darah' => $request->tekanan_darah,

            'suhu_tubuh' => $request->suhu_tubuh,

            'berat_badan' => $request->berat_badan,

            'tinggi_badan' => $request->tinggi_badan,

            'diagnosa' => $request->diagnosa,

            'tindakan' => $request->tindakan,

            'catatan' => $request->catatan

        ]);

        if ($request->obat_id) {

            foreach ($request->obat_id as $index => $obatId) {

                if (!$obatId) {
                    continue;
                }

                ResepObat::create([

                    'rekam_medis_id' => $rekamMedis->id,

                    'obat_id' => $obatId,

                    'jumlah' => $request->jumlah[$index],

                    'aturan_pakai' => $request->aturan_pakai[$index]

                ]);

                $obat = Obat::find($obatId);

                if ($obat) {

                    $obat->decrement(
                        'stok',
                        $request->jumlah[$index]
                    );
                }
            }
        }

        $jadwal->update([
            'status' => 'Selesai'
        ]);
        Notification::create([

            'user_id' => $jadwal->user_id,

            'judul' => 'Konsultasi Selesai',

            'pesan' => 'Rekam medis dan resep obat telah tersedia'

        ]);

        return redirect('/dokter/jadwal')
            ->with(
                'success',
                'Rekam medis berhasil disimpan'
            );
    }

    public function detailRekamMedis($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat.obat'
        ])->findOrFail($id);

        return view(
            'dokter.detail_rekam',
            compact('rekamMedis')
        );
    }

    public function editRekamMedis($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'resepObat.obat'
        ])->findOrFail($id);

        $obat = Obat::orderBy('nama_obat')->get();

        return view(
            'dokter.edit_rekam',
            compact(
                'rekamMedis',
                'obat'
            )
        );
    }

    public function updateRekamMedis(Request $request, $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

        $rekamMedis->update([

            'tekanan_darah' => $request->tekanan_darah,
            'suhu_tubuh'    => $request->suhu_tubuh,
            'berat_badan'   => $request->berat_badan,
            'tinggi_badan'  => $request->tinggi_badan,
            'diagnosa'      => $request->diagnosa,
            'tindakan'      => $request->tindakan,
            'catatan'       => $request->catatan,

        ]);

        // Kembalikan stok obat lama
        foreach ($rekamMedis->resepObat as $resep) {

            $obat = Obat::find($resep->obat_id);

            if ($obat) {

                $obat->increment(
                    'stok',
                    $resep->jumlah
                );
            }
        }

        // Hapus resep lama
        ResepObat::where(
            'rekam_medis_id',
            $rekamMedis->id
        )->delete();

        // Simpan resep baru
        if ($request->obat_id) {

            foreach ($request->obat_id as $index => $obatId) {

                if (!$obatId) {
                    continue;
                }

                ResepObat::create([

                    'rekam_medis_id' => $rekamMedis->id,

                    'obat_id' => $obatId,

                    'jumlah' => $request->jumlah[$index],

                    'aturan_pakai' => $request->aturan_pakai[$index]

                ]);

                $obat = Obat::find($obatId);

                if ($obat) {

                    $obat->decrement(
                        'stok',
                        $request->jumlah[$index]
                    );
                }
            }
        }

        return redirect()
            ->route(
                'rekam-medis.detail',
                $rekamMedis->id
            )
            ->with(
                'success',
                'Rekam medis berhasil diperbarui'
            );
    }
}
