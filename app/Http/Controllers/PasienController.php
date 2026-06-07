<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('pasien.jadwal_pasien');
    }

    public function profile()
    {
        return view('pasien.profile');
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

            'tanggal' => 'required|date',

            'jam' => 'required',

            'keluhan' => 'required'

        ]);

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
                    $request->jam

            ]);
        }

        return back()->with(
            'success',
            'Booking berhasil dibuat'
        );
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
