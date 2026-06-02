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


/* HOME */

Route::get('/', [HomeController::class, 'index']);


/* AUTH */

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
        'password' => Hash::make($request->password)
    ]);

    return redirect('/login')
        ->with('success', 'Password berhasil diubah.');

});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* ADMIN */

Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/dokter', [AdminController::class, 'dokter']);
Route::get('/admin/pasien', [AdminController::class, 'pasien']);
Route::get('/admin/jadwal', [AdminController::class, 'jadwal']);
Route::get('/admin/obat', [AdminController::class, 'obat']);
Route::get('/admin/resep', [AdminController::class, 'resep']);


/* DOKTER */

Route::get('/dokter', [DokterController::class, 'dashboard']);
Route::get('/dokter/jadwal', [DokterController::class, 'jadwal']);
Route::get('/dokter/konsultasi', [DokterController::class, 'konsultasi']);
Route::get('/dokter/pasien', [DokterController::class, 'pasien']);
Route::get('/dokter/kelola', [DokterController::class, 'kelola']);
Route::put('/dokter/rekam_medis/{id}', function () {
    return back()->with('success', 'Data berhasil diupdate');
})->name('rekam_medis.update');

Route::delete('/dokter/rekam-medis/{id}', function () {
    return back()->with('success', 'Data berhasil dihapus');
})->name('rekam_medis.destroy');


/* PASIEN */

Route::get('/pasien', [PasienController::class, 'dashboard']);
Route::get('/pasien/booking', [PasienController::class, 'booking']);
Route::get('/pasien/jadwal', [PasienController::class, 'jadwal']);
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::get('/pasien/riwayat', [PasienController::class, 'riwayat_konsultasi']);
Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis']);