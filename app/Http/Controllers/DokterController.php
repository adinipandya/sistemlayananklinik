<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Dokter;
use App\Models\JadwalKonsultasi;
use App\Models\RekamMedis;
use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\Notification;

use Barryvdh\DomPDF\Facade\Pdf;

class DokterController extends Controller
{
    // ======================================================
    // DASHBOARD DOKTER
    // ======================================================

    public function dashboard()
    {
        $dokter = Dokter::where(
            'email',
            auth()->user()->email
        )->first();

        $pasienHariIni = JadwalKonsultasi::where(
            'dokter_id',
            $dokter->id
        )
            ->whereDate(
                'tanggal',
                today()
            )
            ->count();

        $jadwalHariIni = JadwalKonsultasi::where(
            'dokter_id',
            $dokter->id
        )
            ->whereDate(
                'tanggal',
                today()
            )
            ->count();

        $konsultasiAktif = JadwalKonsultasi::where(
            'dokter_id',
            $dokter->id
        )
            ->where(
                'status',
                'Disetujui'
            )
            ->count();

        $totalRekamMedis = RekamMedis::count();

        $jadwalHariIniList = JadwalKonsultasi::with([
            'pasien'
        ])
            ->where(
                'dokter_id',
                $dokter->id
            )
            ->whereDate(
                'tanggal',
                today()
            )
            ->orderBy('jam')
            ->get();

        return view(
            'dokter.dashboard_dokter',
            compact(
                'dokter',
                'pasienHariIni',
                'jadwalHariIni',
                'konsultasiAktif',
                'totalRekamMedis',
                'jadwalHariIniList'
            )
        );
    }

    public function jadwal(Request $request)
    {
        $dokter = Dokter::where(
            'email',
            auth()->user()->email
        )->first();

        $query = JadwalKonsultasi::with([
            'pasien',
            'dokter'
        ])
            ->where('dokter_id', $dokter->id)
            ->whereDate('tanggal', '>=', today());

        // FILTER STATUS
        if ($request->filled('status')) {

            if ($request->status == 'berjalan') {
                $query->where('status', 'Disetujui');
            } else {
                $query->where('status', ucfirst($request->status));
            }
        }

        $jadwal = $query
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam', 'asc')
            ->get();

        // Statistik tetap ambil semua data, bukan hasil filter
        $allJadwal = JadwalKonsultasi::where(
            'dokter_id',
            $dokter->id
        )
            ->whereDate(
                'tanggal',
                '>=',
                today()
            )
            ->get();

        $totalJadwal = $allJadwal->count();

        $totalMenunggu = $allJadwal
            ->where('status', 'Menunggu')
            ->count();

        $totalSelesai = $allJadwal
            ->where('status', 'Selesai')
            ->count();

        $totalDisetujui = $allJadwal
            ->where('status', 'Disetujui')
            ->count();

        $pasienBerikutnya = $allJadwal
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

    public function kelola(Request $request)
    {
        $search = $request->search;

        $rekamMedis = collect();

        if ($search) {

            $rekamMedis = RekamMedis::with([
                'jadwal.pasien',
                'jadwal.dokter'
            ])

                ->whereHas('jadwal.pasien', function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })

                ->latest()
                ->get();
        }

        $totalRekam = RekamMedis::count();

        $rekamHariIni = RekamMedis::whereDate(
            'created_at',
            today()
        )->count();

        $diagnosaTerbanyak = RekamMedis::select(
            'diagnosa',
            DB::raw('count(*) as total')
        )
            ->groupBy('diagnosa')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $aktivitasTerakhir = RekamMedis::with('jadwal.pasien')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'dokter.kelola_rekam',
            compact(
                'rekamMedis',
                'search',
                'totalRekam',
                'rekamHariIni',
                'diagnosaTerbanyak',
                'aktivitasTerakhir'
            )
        );
    }

    public function profile()
    {
        $dokter = Dokter::where('email', auth()->user()->email)->first();

        return view('dokter.profile', compact('dokter'));
    }

    public function password()
    {
        return view('dokter.password');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'no_hp' => 'required'
        ]);

        $user = Auth::user();

        $user->update([
            'email' => $request->email
        ]);

        Dokter::where('email', $user->email)
            ->update([
                'no_hp' => $request->no_hp
            ]);

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

        $search = $request->search;

        if ($search) {

            $pasien = User::where('role', 'pasien')
                ->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })
                ->get()
                ->map(function ($item) {

                    $diagnosaTerakhir = \App\Models\RekamMedis::whereHas(
                        'jadwal',
                        function ($q) use ($item) {
                            $q->where('user_id', $item->id);
                        }
                    )
                        ->latest()
                        ->value('diagnosa');

                    $item->diagnosa_terakhir = $diagnosaTerakhir ?? '-';

                    return $item;
                });
        } else {

            $pasien = collect();
        }

        $totalPasien = User::where('role', 'pasien')->count();

        return view(
            'dokter.data_pasien',
            compact(
                'pasien',
                'search',
                'totalPasien',
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

    public function resep(Request $request)
    {
        $search = $request->search;

        if ($search) {

            $rekamMedis = RekamMedis::with([
                'jadwal.pasien',
                'resepObat'
            ])

                ->whereHas('jadwal.pasien', function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })

                ->latest()
                ->get();
        } else {

            $rekamMedis = RekamMedis::with([
                'jadwal.pasien',
                'resepObat'
            ])
                ->latest()
                ->get();
        }

        // Statistik tetap ambil semua data
        $allRekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'resepObat'
        ])->get();

        $totalResep = $allRekamMedis->count();

        $resepHariIni = $allRekamMedis
            ->where('created_at', '>=', now()->startOfDay())
            ->count();

        $pasienTerlayani = $allRekamMedis
            ->pluck('jadwal.pasien.id')
            ->unique()
            ->count();

        return view(
            'dokter.resep_obat',
            compact(
                'rekamMedis',
                'search',
                'totalResep',
                'resepHariIni',
                'pasienTerlayani'
            )
        );
    }

    public function detailResep($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat'
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

        if ($request->nama_obat) {

            foreach ($request->nama_obat as $index => $namaObat) {

                if (!$namaObat) {
                    continue;
                }

                ResepObat::create([

                    'rekam_medis_id' => $rekamMedis->id,

                    'nama_obat' => $namaObat,

                    'jumlah' => $request->jumlah[$index],

                    'aturan_pakai' => $request->aturan_pakai[$index]

                ]);
            }
        }

        $jadwal->update([
    'status' => 'Selesai'
]);

// Notifikasi ke pasien
Notification::create([
    'user_id' => $jadwal->user_id,
    'judul'   => 'Konsultasi Selesai',
    'pesan'   => 'Rekam medis dan resep obat telah tersedia',
]);

// Notifikasi ke admin
$admin = User::where('role', 'admin')->first();
if ($admin) {
    Notification::create([
        'user_id' => $admin->id,
        'judul'   => 'Konsultasi Selesai',
        'pesan'   => 'Jadwal konsultasi pasien ' . $jadwal->pasien->name . ' telah selesai',
    ]);
}

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
            'resepObat'
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
            'resepObat'
        ])->findOrFail($id);

        return view(
            'dokter.edit_rekam',
            compact('rekamMedis')
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

        // Hapus resep lama
        ResepObat::where(
            'rekam_medis_id',
            $rekamMedis->id
        )->delete();

        // Simpan resep baru
        if ($request->nama_obat) {

            foreach ($request->nama_obat as $index => $namaObat) {

                if (!$namaObat) {
                    continue;
                }

                ResepObat::create([

                    'rekam_medis_id' => $rekamMedis->id,

                    'nama_obat' => $namaObat,

                    'jumlah' => $request->jumlah[$index],

                    'aturan_pakai' => $request->aturan_pakai[$index]

                ]);
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

    public function printRekam($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat'
        ])->findOrFail($id);

        return view(
            'dokter.print_rekam',
            compact('rekamMedis')
        );
    }

    public function downloadResep($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat'
        ])->findOrFail($id);

        return view('dokter.download_resep', compact('rekamMedis'));
    }

    public function printResep($id)
    {
        $rekamMedis = RekamMedis::with([
            'jadwal.pasien',
            'jadwal.dokter',
            'resepObat'
        ])->findOrFail($id);

        return view('dokter.cetak_resep', compact('rekamMedis'));
    }
}
