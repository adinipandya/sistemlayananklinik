<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AuthController;
use App\Models\User;


/* ─── HOME ──────────────────────────────────────────────────────── */

Route::get('/', [HomeController::class, 'index']);


/* ─── AUTH ──────────────────────────────────────────────────────── */

Route::get('/login', function () {
    return view('auth.login');
});

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


/* ─── ADMIN ─────────────────────────────────────────────────────── */

Route::get('/admin',           [AdminController::class, 'dashboard']);
Route::get('/admin/dokter',    [AdminController::class, 'dokter']);
Route::get('/admin/pasien',    [AdminController::class, 'pasien']);
Route::get('/admin/jadwal',    [AdminController::class, 'jadwal']);
Route::get('/admin/obat',      [AdminController::class, 'obat']);
Route::get('/admin/resep',     [AdminController::class, 'resep']);
Route::get('/admin/feedback',  [AdminController::class, 'feedback']);      

Route::put('/admin/feedback/{id}',         [AdminController::class, 'updateFeedback']);
Route::post('/admin/dokter',               [AdminController::class, 'storeDokter']);
Route::put('/admin/pasien/{id}/verifikasi',[AdminController::class, 'verifikasiPasien']);

Route::post('/admin/obat/store', [AdminController::class, 'storeObat'])->name('obat.store');
Route::put('/admin/obat/{id}',   [AdminController::class, 'updateObat'])->name('obat.update');
Route::delete('/admin/obat/{id}',[AdminController::class, 'destroyObat'])->name('obat.destroy');


/* ─── DOKTER ────────────────────────────────────────────────────── */

Route::get('/dokter',              [DokterController::class, 'dashboard']);
Route::get('/dokter/jadwal',       [DokterController::class, 'jadwal']);
Route::get('/dokter/pasien',       [DokterController::class, 'datapasien']);
Route::get('/dokter/kelola',       [DokterController::class, 'kelola']);
Route::get('/dokter/data_pasien',  [DokterController::class, 'datapasien']);
Route::get('/dokter/resep',        [DokterController::class, 'resep'])->name('resep.index');

// Profile & pengaturan — pakai controller (hapus closure duplikat)
Route::get('/dokter/profile',    [DokterController::class, 'profile']);
Route::post('/dokter/profile',   [DokterController::class, 'updateProfile']);
Route::post('/dokter/profile/delete-photo', [DokterController::class, 'deletePhoto']);
Route::get('/dokter/password',   [DokterController::class, 'password']);
Route::get('/dokter/pengaturan', function () {
    return view('dokter.pengaturan');
});

// Jadwal
Route::post('/dokter/jadwal/batal/{id}', [DokterController::class, 'batalkanJadwal'])
    ->name('jadwal.batal');                                                 // ← satu saja

// Konsultasi
Route::get('/dokter/konsultasi/{id}',        [DokterController::class, 'konsultasi'])
    ->name('dokter.konsultasi');
Route::post('/dokter/konsultasi/{id}/simpan',[DokterController::class, 'simpanRekamMedis'])
    ->name('rekam-medis.store');

// Rekam medis
Route::get('/dokter/rekam-medis/detail/{id}', [DokterController::class, 'detailRekamMedis'])
    ->name('rekam-medis.detail');
Route::get('/dokter/rekam-medis/edit/{id}',   [DokterController::class, 'editRekamMedis'])
    ->name('rekam-medis.edit');
Route::put('/dokter/rekam-medis/update/{id}', [DokterController::class, 'updateRekamMedis'])
    ->name('rekam-medis.update');
Route::delete('/dokter/rekam-medis/{id}',     [DokterController::class, 'destroyRekamMedis'])
    ->name('rekam_medis.destroy');

// Resep download
Route::get('/resep/{id}/download', [DokterController::class, 'downloadResep'])
    ->name('resep.download');

// Print rekam (view saja)
Route::get('/dokter/rekam-medis/print', function () {
    return view('dokter.print_rekam');
});
Route::get('/resep/{id}/print', [DokterController::class, 'printResep'])
    ->name('resep.print');


/* ─── PASIEN ────────────────────────────────────────────────────── */

Route::get('/pasien',          [PasienController::class, 'dashboard']);
Route::get('/pasien/profile',  [PasienController::class, 'profile']);
Route::get('/pasien/riwayat',  [PasienController::class, 'riwayat_konsultasi']);
Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis']);

// Booking — satu pasang GET/POST dengan satu nama route
Route::get('/pasien/booking',  [PasienController::class, 'booking']);
Route::post('/pasien/booking', [PasienController::class, 'storeBooking'])->name('booking.store');

// Jadwal
Route::get('/pasien/jadwal', [PasienController::class, 'jadwal'])
    ->name('pasien.jadwal');
Route::get('/pasien/jadwal/{id}', [PasienController::class, 'detailJadwal'])
    ->name('pasien.jadwal.detail');

// Feedback
Route::get('/pasien/feedback',         [PasienController::class, 'feedback']);
Route::post('/pasien/feedback',        [PasienController::class, 'storeFeedback']);
Route::put('/pasien/feedback/{id}',    [PasienController::class, 'updateFeedback']);
Route::delete('/pasien/feedback/{id}', [PasienController::class, 'destroyFeedback']);

// Profile
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::get('/pasien/pengaturan', [PasienController::class, 'pengaturan']);