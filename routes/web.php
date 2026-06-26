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


/* ─── NOTIFIKASI ─────────────────────────────────────────────────── */

Route::post('/admin/notifications/{id}/read', function ($id) {
    Notification::where('id', $id)
        ->where('user_id', auth()->id())
        ->update(['is_read' => true]);
    return response()->json(['ok' => true]);
})->middleware('auth');


/* ─── ADMIN ─────────────────────────────────────────────────────── */

Route::get('/admin',           [AdminController::class, 'dashboard']);
Route::get('/admin/dokter',    [AdminController::class, 'dokter']);
Route::get('/admin/pasien',    [AdminController::class, 'pasien']);
Route::get('/admin/jadwal',    [AdminController::class, 'jadwal']);
Route::get('/admin/obat',      [AdminController::class, 'obat']);
Route::get('/admin/feedback',  [AdminController::class, 'feedback']);

Route::get('/admin/pengaturan',       [AdminController::class, 'pengaturan']);
Route::put('/admin/pengaturan',       [AdminController::class, 'updatePengaturan']);
Route::post('/admin/pengaturan/foto', [AdminController::class, 'updateFoto']);
Route::get('/admin/password',         [AdminController::class, 'passwordPage']);
Route::put('/admin/password',         [AdminController::class, 'updatePassword']);

Route::put('/admin/feedback/{id}',          [AdminController::class, 'updateFeedback']);
Route::put('/admin/pasien/{id}/verifikasi', [AdminController::class, 'verifikasiPasien']);

Route::post('/admin/dokter',               [AdminController::class, 'storeDokter'])->name('dokter.store');
Route::put('/admin/dokter/{id}',           [AdminController::class, 'updateDokter'])->name('dokter.update');
Route::delete('/admin/dokter/{id}',        [AdminController::class, 'destroyDokter'])->name('dokter.destroy');

Route::post('/admin/obat',        [AdminController::class, 'storeObat'])->name('obat.store');
Route::put('/admin/obat/{id}',    [AdminController::class, 'updateObat'])->name('obat.update');
Route::delete('/admin/obat/{id}', [AdminController::class, 'destroyObat'])->name('obat.destroy');

Route::put('/admin/jadwal/{id}/status', [AdminController::class, 'updateStatusJadwal']);
Route::delete('/admin/jadwal/{id}',     [AdminController::class, 'destroyJadwal']);


/* ─── DOKTER ────────────────────────────────────────────────────── */

Route::get('/dokter',              [DokterController::class, 'dashboard']);
Route::get('/dokter/jadwal',       [DokterController::class, 'jadwal']);
Route::get('/dokter/pasien',       [DokterController::class, 'datapasien']);
Route::get('/dokter/kelola',       [DokterController::class, 'kelola']);
Route::get('/dokter/data_pasien',  [DokterController::class, 'datapasien']);
Route::get('/dokter/resep',        [DokterController::class, 'resep'])->name('resep.index');

Route::get('/dokter/profile',    [DokterController::class, 'profile']);
Route::post('/dokter/profile',   [DokterController::class, 'updateProfile']);
Route::post('/dokter/profile/delete-photo', [DokterController::class, 'deletePhoto']);
Route::get('/dokter/password',   [DokterController::class, 'password']);
Route::get('/dokter/pengaturan', function () {
    return view('dokter.pengaturan');
});

Route::post('/dokter/jadwal/batal/{id}', [DokterController::class, 'batalkanJadwal'])
    ->name('jadwal.batal');

Route::get('/dokter/konsultasi/{id}',         [DokterController::class, 'konsultasi'])
    ->name('dokter.konsultasi');
Route::post('/dokter/konsultasi/{id}/simpan', [DokterController::class, 'simpanRekamMedis'])
    ->name('rekam-medis.store');

Route::get('/dokter/rekam-medis/detail/{id}', [DokterController::class, 'detailRekamMedis'])
    ->name('rekam-medis.detail');
Route::get('/dokter/rekam-medis/edit/{id}',   [DokterController::class, 'editRekamMedis'])
    ->name('rekam-medis.edit');
Route::put('/dokter/rekam-medis/update/{id}', [DokterController::class, 'updateRekamMedis'])
    ->name('rekam-medis.update');
Route::delete('/dokter/rekam-medis/{id}',     [DokterController::class, 'destroyRekamMedis'])
    ->name('rekam_medis.destroy');

Route::get('/resep/{id}/download', [DokterController::class, 'downloadResep'])
    ->name('resep.download');

Route::get('/dokter/rekam-medis/print', function () {
    return view('dokter.print_rekam');
});
Route::get('/resep/{id}/print', [DokterController::class, 'printResep'])
    ->name('resep.print');


/* ─── PASIEN ────────────────────────────────────────────────────── */

Route::get('/pasien', [PasienController::class, 'dashboard']);
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::get('/pasien/riwayat', [PasienController::class, 'riwayat_konsultasi']);
Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis']);

Route::get('/pasien/booking', [PasienController::class, 'booking'])
    ->name('booking');

Route::get('/pasien/booking/dokter/{id}', [PasienController::class, 'pilihDokter'])
    ->name('booking.dokter');

Route::post('/pasien/booking', [PasienController::class, 'storeBooking'])
    ->name('booking.store');

Route::get('/pasien/jadwal', [PasienController::class, 'jadwal'])
    ->name('pasien.jadwal');

Route::get('/pasien/jadwal/{id}', [PasienController::class, 'detailJadwal'])
    ->name('pasien.jadwal.detail');

Route::get('/pasien/feedback', [PasienController::class, 'feedback']);
Route::post('/pasien/feedback', [PasienController::class, 'storeFeedback']);
Route::put('/pasien/feedback/{id}', [PasienController::class, 'updateFeedback']);
Route::delete('/pasien/feedback/{id}', [PasienController::class, 'destroyFeedback']);

Route::post('/pasien/profile', [PasienController::class, 'updateProfile'])
    ->name('pasien.profile.update');

Route::get('/pasien/pengaturan', [PasienController::class, 'pengaturan']);

Route::post('/pasien/password', [PasienController::class, 'updatePassword'])
    ->name('pasien.password.update');

// Profile
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::post('/pasien/profile', [PasienController::class, 'updateProfile'])
    ->name('pasien.profile.update');
Route::get('/pasien/pengaturan', [PasienController::class, 'pengaturan']);
Route::post('/pasien/password', [PasienController::class, 'updatePassword'])
    ->name('pasien.password.update');
Route::get('/pasien/pengaturan', [PasienController::class, 'pengaturan']);