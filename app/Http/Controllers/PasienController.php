<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Feedback;
use App\Models\Dokter;
use App\Models\JadwalKonsultasi;
use App\Models\Notification;
use App\Models\User;

class PasienController extends Controller
{
    // PASIEN
    public function dashboard()
{
    $jadwalBerikutnya = JadwalKonsultasi::with('dokter')
    ->where('user_id', Auth::id())
    ->whereIn('status', ['Menunggu', 'Disetujui'])
    ->whereDate('tanggal', '>=', now()->toDateString())
    ->orderBy('tanggal')
    ->orderBy('jam')
    ->first();

    $bookingAktif = JadwalKonsultasi::where('user_id', Auth::id())
    ->whereIn('status', ['Menunggu', 'Disetujui'])
    ->whereDate('tanggal', '>=', now()->toDateString())
    ->count();

    $konsultasiSelesai = JadwalKonsultasi::where('user_id', Auth::id())
        ->where('status', 'Selesai')
        ->count();

    $feedbackTotal = Feedback::where('user_id', Auth::id())
    ->where('status', 'Direspon')
    ->count();

    $riwayatTerbaru = JadwalKonsultasi::with('dokter')
    ->where('user_id', Auth::id())
    ->where('status', 'Selesai')
    ->latest()
    ->take(5)
    ->get();

    return view(
        'pasien.dashboard_pasien',
        compact(
            'jadwalBerikutnya',
            'bookingAktif',
            'konsultasiSelesai',
            'feedbackTotal',
            'riwayatTerbaru'
        )
    );
}

 public function jadwal()
{
    $jadwal = JadwalKonsultasi::with('dokter')
        ->where('user_id', Auth::id())
        ->orderBy('tanggal')
        ->orderBy('jam')
        ->get();

    $jadwalAktif = $jadwal
    ->filter(function ($item) {
        return in_array($item->status, ['Menunggu', 'Disetujui'])
            && $item->tanggal >= now()->toDateString();
    })
    ->count();

    $konsultasiSelesai = $jadwal
        ->where('status', 'Selesai')
        ->count();

    $totalBooking = $jadwal->count();

    $jadwalTerdekat = $jadwal
    ->filter(function ($item) {
        return in_array($item->status, ['Menunggu', 'Disetujui'])
            && $item->tanggal >= now()->toDateString();
    })
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
    $totalPemeriksaan = JadwalKonsultasi::where(
        'user_id',
        Auth::id()
    )->count();

    $selesai = JadwalKonsultasi::where(
        'user_id',
        Auth::id()
    )
    ->where('status', 'Selesai')
    ->count();

    $menunggu = JadwalKonsultasi::where(
        'user_id',
        Auth::id()
    )
    ->whereIn('status', ['Menunggu', 'Disetujui'])
    ->count();

    $riwayat = JadwalKonsultasi::with('dokter')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view(
        'pasien.rekam_medis',
        compact(
            'totalPemeriksaan',
            'selesai',
            'menunggu',
            'riwayat'
        )
    );
}
    public function riwayat_konsultasi()
{
    $riwayat = JadwalKonsultasi::with('dokter')
        ->where('user_id', Auth::id())
        ->orderBy('tanggal', 'desc')
        ->get();

    $totalPemeriksaan = $riwayat->count();

    $selesai = $riwayat
        ->where('status', 'Selesai')
        ->count();

    $menunggu = $riwayat
        ->whereIn('status', ['Menunggu', 'Disetujui'])
        ->count();

    return view(
        'pasien.riwayat_konsultasi',
        compact(
            'riwayat',
            'totalPemeriksaan',
            'selesai',
            'menunggu'
        )
    );
}

    public function booking()
    {
        $dokters = Dokter::where('status', 'Aktif')->get();

        $hariIni = now()->locale('id')->translatedFormat('l');

foreach ($dokters as $dokter) {

    $dokter->tersedia = str_contains(
        strtolower($dokter->hari_praktek),
        strtolower($hariIni)
    );

}

        $dokterTersedia = $dokters->count();

        $riwayat = JadwalKonsultasi::with('dokter')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
            $bookingAktif = JadwalKonsultasi::where('user_id', Auth::id())
    ->whereIn('status', ['Menunggu', 'Disetujui'])
    ->count();
    $totalKonsultasi = JadwalKonsultasi::where(
    'user_id',
    Auth::id()
)
->where('status', 'Selesai')
->count();

        return view(
            'pasien.booking',
            compact(
    'dokters',
    'riwayat',
    'bookingAktif',
    'totalKonsultasi',
    'dokterTersedia'
)
        );
    }
    public function pilihDokter($id)
{
    $dokter = Dokter::findOrFail($id);

    $bookingAktif = JadwalKonsultasi::where(
        'user_id',
        Auth::id()
    )
    ->whereIn('status', ['Menunggu','Disetujui'])
    ->count();

    $totalKonsultasi = JadwalKonsultasi::where(
        'user_id',
        Auth::id()
    )
    ->where('status','Selesai')
    ->count();

    $dokterTersedia = Dokter::where(
        'status',
        'Aktif'
    )->count();

    return view(
        'pasien.booking_form',
        compact(
            'dokter',
            'bookingAktif',
            'totalKonsultasi',
            'dokterTersedia'
        )
    );
}

 public function storeBooking(Request $request)
{
    $user = Auth::user();

if (
    empty($user->nik) ||
    empty($user->no_hp) ||
    empty($user->tanggal_lahir) ||
    empty($user->jenis_kelamin) ||
    empty($user->alamat)
) {
    return redirect('/pasien/profile')
        ->with(
            'error',
            'Lengkapi data diri terlebih dahulu sebelum melakukan booking.'
        );
}
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
    $jumlahAntrian = JadwalKonsultasi::where(
    'dokter_id',
    $request->dokter_id
)
->where(
    'tanggal',
    $request->tanggal
)
->count();

$nomorAntrian = 'A-' . str_pad(
    $jumlahAntrian + 1,
    3,
    '0',
    STR_PAD_LEFT
);

    $jadwal = JadwalKonsultasi::create([

    'user_id' => Auth::id(),

    'dokter_id' => $request->dokter_id,

    'tanggal' => $request->tanggal,

    'jam' => $request->jam,

    'keluhan' => $request->keluhan,

    'nomor_antrian' => $nomorAntrian,

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

    return back()->with([
    'success' => 'Booking berhasil dibuat',
    'nomor_antrian' => $jadwal->nomor_antrian
]);
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

public function updateProfile(Request $request)
{
    $user = User::find(Auth::id());

    $user->name = $request->name;
    $user->no_hp = $request->no_hp;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->jenis_kelamin = $request->jenis_kelamin;
    $user->alamat = $request->alamat;

    if ($request->hasFile('photo')) {

        $photo = $request->file('photo')
            ->store('profile', 'public');

        $user->photo = $photo;
    }
$user->save();
    return back()->with(
        'success',
        'Profil berhasil diperbarui'
    );
}

public function pengaturan()
{
    return view('pasien.pengaturan_pasien');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8|confirmed'
    ]);

 if (!Hash::check($request->old_password, Auth::user()->password)) {
    return back()->with('error', 'Password lama salah');
}

$user = Auth::user();

$user->password = Hash::make($request->new_password);

$user->save();

return back()->with('success', 'Password berhasil diubah');
}

public function feedback()
{
    $feedback = Feedback::where(
        'user_id',
        Auth::id()
    )->latest()->get();

    $feedbackDikirim = $feedback->count();

    $feedbackDirespon = $feedback
        ->where('status', 'Direspon')
        ->count();

    $ratingRataRata = round(
        $feedback->avg('rating') ?? 0,
        1
    );

    return view(
        'pasien.feedback',
        compact(
            'feedback',
            'feedbackDikirim',
            'feedbackDirespon',
            'ratingRataRata'
        )
    );
}

    public function storeFeedback(Request $request)
{
    $feedback = Feedback::create([
        'user_id'  => Auth::id(),
        'kategori' => $request->kategori,
        'rating'   => $request->rating,
        'komentar' => $request->komentar
    ]);

    // Notifikasi ke admin
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        Notification::create([
            'user_id' => $admin->id,
            'judul'   => 'Feedback Baru',
            'pesan'   => Auth::user()->name . ' mengirimkan feedback baru dengan rating ' . $request->rating,
        ]);
    }

    return back()->with('success', 'Feedback berhasil dikirim');
}

    public function updateFeedback(Request $request, $id)
    {
        $feedback = Feedback::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($feedback->status == 'Direspon') {
            return back()->with('error', 'Feedback yang sudah direspon tidak dapat diubah');
        }

        $feedback->update([
            'kategori' => $request->kategori,
            'rating'   => $request->rating,
            'komentar' => $request->komentar
        ]);

        return back()->with('success', 'Feedback berhasil diperbarui');
    }

    public function destroyFeedback($id)
    {
        $feedback = Feedback::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($feedback->status == 'Direspon') {
            return back()->with('error', 'Feedback yang sudah direspon tidak dapat dihapus');
        }

        $feedback->delete();

        return back()->with('success', 'Feedback berhasil dihapus');
    }
}