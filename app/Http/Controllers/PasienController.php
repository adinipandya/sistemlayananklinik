<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Feedback;
use App\Models\Dokter;
use App\Models\JadwalKonsultasi;
use App\Models\Notification;
use App\Models\User;

class PasienController extends Controller
{
    public function dashboard()
    {
        return view('pasien.dashboard_pasien');
    }

 public function jadwal()
{
    $jadwal = JadwalKonsultasi::with('dokter')
        ->where('user_id', Auth::id())
        ->orderBy('tanggal')
        ->orderBy('jam')
        ->get();

    $jadwalAktif = $jadwal
        ->whereIn('status', ['Menunggu', 'Disetujui'])
        ->count();

    $konsultasiSelesai = $jadwal
        ->where('status', 'Selesai')
        ->count();

    $totalBooking = $jadwal->count();

    $jadwalTerdekat = $jadwal
        ->whereIn('status', ['Menunggu', 'Disetujui'])
        ->sortBy('tanggal')
        ->first();

    return view(
        'pasien.jadwal_pasien',
        compact(
            'jadwal',
            'jadwalAktif',
            'konsultasiSelesai',
            'totalBooking',
            'jadwalTerdekat'
        )
    );
}
    public function rekam_medis()
    {
        return view('pasien.rekam_medis');
    }
    public function riwayat_konsultasi()
    {
        return view('pasien.riwayat_konsultasi');
    }

    public function booking()
    {
        $dokters = Dokter::where(
            'status',
            'Aktif'
        )->get();

        $riwayat = JadwalKonsultasi::with('dokter')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'pasien.booking',
            compact(
                'dokters',
                'riwayat'
            )
        );
    }

 public function storeBooking(Request $request)
{
    $request->validate([

        'dokter_id' => 'required|exists:dokters,id',

        'tanggal' => 'required|date|after_or_equal:today',

        'jam' => 'required',

        'keluhan' => 'required'

    ]);

    $cekJadwal = JadwalKonsultasi::where(
        'dokter_id',
        $request->dokter_id
    )
    ->where(
        'tanggal',
        $request->tanggal
    )
    ->where(
        'jam',
        $request->jam
    )
    ->whereIn(
        'status',
        [
            'Menunggu',
            'Disetujui'
        ]
    )
    ->exists();

    if ($cekJadwal) {

        return back()->with(
            'error',
            'Jadwal dokter pada jam tersebut sudah dibooking'
        );

    }

    $jadwal = JadwalKonsultasi::create([

        'user_id' => Auth::id(),

        'dokter_id' => $request->dokter_id,

        'tanggal' => $request->tanggal,

        'jam' => $request->jam,

        'keluhan' => $request->keluhan,

        'status' => 'Menunggu'

    ]);

    $dokter = User::where(
        'role',
        'dokter'
    )->first();

    if ($dokter) {

        Notification::create([

            'user_id' => $dokter->id,

            'judul' => 'Booking Baru',

            'pesan' => Auth::user()->name .
                ' membuat jadwal konsultasi pada ' .
                $request->tanggal .
                ' pukul ' .
                $request->jam,

            'is_read' => false

        ]);
    }

    return back()->with(
        'success',
        'Booking berhasil dibuat'
    );
}
public function detailJadwal($id)
{
    $jadwal = JadwalKonsultasi::with('dokter')
        ->findOrFail($id);

    return view('pasien.detail_jadwal', compact('jadwal'));
}
public function profile()
{
    return view('pasien.profile_pasien');
}

public function pengaturan()
{
    return view('pasien.pengaturan_pasien');
}
    public function feedback()
    {
        $feedback = Feedback::where(
            'user_id',
            Auth::id()
        )->latest()->get();

        return view(
            'pasien.feedback',
            compact('feedback')
        );
    }

    public function storeFeedback(Request $request)
    {
        Feedback::create([

            'user_id' => Auth::id(),

            'kategori' => $request->kategori,

            'rating' => $request->rating,

            'komentar' => $request->komentar

        ]);

        return back()->with(
            'success',
            'Feedback berhasil dikirim'
        );
    }

    public function updateFeedback(Request $request, $id)
    {
        $feedback = Feedback::where(
            'id',
            $id
        )->where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        if ($feedback->status == 'Direspon') {

            return back()->with(
                'error',
                'Feedback yang sudah direspon tidak dapat diubah'
            );
        }

        $feedback->update([

            'kategori' => $request->kategori,
            'rating' => $request->rating,
            'komentar' => $request->komentar

        ]);

        return back()->with(
            'success',
            'Feedback berhasil diperbarui'
        );
    }

    public function destroyFeedback($id)
    {
        $feedback = Feedback::where(
            'id',
            $id
        )->where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        if ($feedback->status == 'Direspon') {

            return back()->with(
                'error',
                'Feedback yang sudah direspon tidak dapat dihapus'
            );
        }

        $feedback->delete();

        return back()->with(
            'success',
            'Feedback berhasil dihapus'
        );
    }
}
