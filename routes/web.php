<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AuthController;

use App\Models\User;
use App\Models\Notification;


/* ─── HOME ──────────────────────────────────────────────────────── */

Route::get('/', [HomeController::class, 'index']);


/* ─── AUTH ──────────────────────────────────────────────────────── */

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/forgot_password', function () {
    return view('auth.forgot_password');
});

Route::post('/forgot_password', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan.');
    }

    $user = User::where('email', $request->email)
        ->where('nik', $request->nik)
        ->first();
    $request->validate([
        'email' => 'required|email',
        'nik' => 'required|digits:16',
        'password' => 'required|min:8'
    ]);
    if (!$user) {
        return back()->with(
            'error',
            'Email atau NIK tidak sesuai.'
        );
    }

    if ($request->password != $request->password_confirmation) {
        return back()->with('error', 'Konfirmasi password tidak cocok.');
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Password berhasil diubah.');
});

Route::post('/login',    [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| NOTIFIKASI
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::post('/notifications/{id}/read', function ($id) {
        Notification::where('id', $id)
            ->where('user_id', auth()->id())
            ->update(['is_read' => true]);

        return response()->json(['ok' => true]);
    })->name('notifications.read');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/dokter', [AdminController::class, 'dokter'])->name('admin.dokter');
    Route::post('/admin/dokter', [AdminController::class, 'storeDokter'])->name('dokter.store');
    Route::put('/admin/dokter/{id}', [AdminController::class, 'updateDokter'])->name('dokter.update');
    Route::delete('/admin/dokter/{id}', [AdminController::class, 'destroyDokter'])->name('dokter.destroy');

    Route::get('/admin/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::put('/admin/pasien/{id}/verifikasi', [AdminController::class, 'verifikasiPasien'])->name('admin.pasien.verifikasi');

    Route::get('/admin/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::put('/admin/jadwal/{id}/status', [AdminController::class, 'updateStatusJadwal'])->name('admin.jadwal.status');
    Route::delete('/admin/jadwal/{id}', [AdminController::class, 'destroyJadwal'])->name('admin.jadwal.destroy');

    Route::get('/admin/obat', [AdminController::class, 'obat'])->name('admin.obat');
    Route::post('/admin/obat', [AdminController::class, 'storeObat'])->name('obat.store');
    Route::put('/admin/obat/{id}', [AdminController::class, 'updateObat'])->name('obat.update');
    Route::delete('/admin/obat/{id}', [AdminController::class, 'destroyObat'])->name('obat.destroy');

    Route::get('/admin/resep', [AdminController::class, 'resep'])->name('admin.resep');

    Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
    Route::put('/admin/feedback/{id}', [AdminController::class, 'updateFeedback'])->name('admin.feedback.update');

    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    Route::put('/admin/pengaturan', [AdminController::class, 'updatePengaturan'])->name('admin.pengaturan.update');
    Route::post('/admin/pengaturan/foto', [AdminController::class, 'updateFoto'])->name('admin.pengaturan.foto');

    Route::get('/admin/password', [AdminController::class, 'passwordPage'])->name('admin.password');
    Route::put('/admin/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
});


/*
|--------------------------------------------------------------------------
| DOKTER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:dokter'])->group(function () {

    Route::get('/dokter', [DokterController::class, 'dashboard'])->name('dokter.dashboard');

    Route::get('/dokter/jadwal', [DokterController::class, 'jadwal'])->name('dokter.jadwal');
    Route::post('/dokter/jadwal/batal/{id}', [DokterController::class, 'batalkanJadwal'])->name('jadwal.batal');

    Route::get('/dokter/data_pasien', [DokterController::class, 'datapasien'])->name('dokter.data_pasien');

    Route::get('/dokter/konsultasi/{id}', [DokterController::class, 'konsultasi'])->name('dokter.konsultasi');
    Route::post('/dokter/konsultasi/{id}/simpan', [DokterController::class, 'simpanRekamMedis'])->name('rekam-medis.store');

    Route::get('/dokter/kelola', [DokterController::class, 'kelola'])->name('dokter.kelola');
    Route::get('/dokter/rekam-medis', [DokterController::class, 'kelola'])->name('dokter.rekam_medis');

    Route::get('/dokter/rekam-medis/detail/{id}', [DokterController::class, 'detailRekamMedis'])->name('rekam-medis.detail');
    Route::get('/dokter/rekam-medis/edit/{id}', [DokterController::class, 'editRekamMedis'])->name('rekam-medis.edit');
    Route::put('/dokter/rekam-medis/update/{id}', [DokterController::class, 'updateRekamMedis'])->name('rekam-medis.update');
    Route::delete('/dokter/rekam-medis/{id}', [DokterController::class, 'destroyRekamMedis'])->name('rekam-medis.destroy');

    Route::get('/dokter/rekam-medis/print/{id}', [DokterController::class, 'printRekam'])->name('rekam-medis.print');

    Route::get('/dokter/resep', [DokterController::class, 'resep'])->name('resep.index');
    Route::get('/dokter/resep/{id}', [DokterController::class, 'detailResep'])->name('resep.detail');

    Route::get('/resep/{id}/download', [DokterController::class, 'downloadResep'])->name('resep.download');
    Route::get('/resep/{id}/print', [DokterController::class, 'printResep'])->name('resep.print');

    Route::get('/dokter/profile', [DokterController::class, 'profile'])->name('dokter.profile');
    Route::post('/dokter/profile', [DokterController::class, 'updateProfile'])->name('dokter.profile.update');
    Route::post('/dokter/profile/delete-photo', [DokterController::class, 'deletePhoto'])->name('dokter.profile.delete_photo');

    Route::get('/dokter/password', [DokterController::class, 'password'])->name('dokter.password');

    Route::get('/dokter/pengaturan', function () {
        return view('dokter.pengaturan');
    })->name('dokter.pengaturan');
});


/*
|--------------------------------------------------------------------------
| PASIEN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pasien'])->group(function () {

    Route::get('/pasien', [PasienController::class, 'dashboard'])->name('pasien.dashboard');

    Route::get('/pasien/profile', [PasienController::class, 'profile'])->name('pasien.profile');
    Route::post('/pasien/profile', [PasienController::class, 'updateProfile'])->name('pasien.profile.update');

    Route::get('/pasien/pengaturan', [PasienController::class, 'pengaturan'])->name('pasien.pengaturan');
    Route::post('/pasien/password', [PasienController::class, 'updatePassword'])->name('pasien.password.update');

    Route::get('/pasien/riwayat', [PasienController::class, 'riwayat_konsultasi'])->name('pasien.riwayat');
    Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis'])->name('pasien.rekam_medis');

    Route::get('/pasien/booking', [PasienController::class, 'booking'])->name('booking');
    Route::get('/pasien/booking/dokter/{id}', [PasienController::class, 'pilihDokter'])->name('booking.dokter');
    Route::post('/pasien/booking', [PasienController::class, 'storeBooking'])->name('booking.store');

    Route::get('/pasien/jadwal', [PasienController::class, 'jadwal'])->name('pasien.jadwal');
    Route::get('/pasien/jadwal/{id}', [PasienController::class, 'detailJadwal'])->name('pasien.jadwal.detail');

    Route::get('/pasien/feedback', [PasienController::class, 'feedback'])->name('pasien.feedback');
    Route::post('/pasien/feedback', [PasienController::class, 'storeFeedback'])->name('pasien.feedback.store');
    Route::put('/pasien/feedback/{id}', [PasienController::class, 'updateFeedback'])->name('pasien.feedback.update');
    Route::delete('/pasien/feedback/{id}', [PasienController::class, 'destroyFeedback'])->name('pasien.feedback.destroy');
});
