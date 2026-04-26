<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

// HOME
Route::get('/', [HomeController::class, 'index']);

// LOGIN
Route::get('/login', function () {
    return view('auth.login');
});
use Illuminate\Http\Request;

Route::post('/login', function (Request $request) {

    $role = $request->role;

    if ($role == 'Admin') {
        return redirect('/admin');
    } 
    elseif ($role == 'Dokter') {
        return redirect('/dokter');
    } 
    else {
        return redirect('/pasien');
    }

});

// Logout
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ADMIN
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/dokter', [AdminController::class, 'dokter']);
Route::get('/admin/pasien', [AdminController::class, 'pasien']);
Route::get('/admin/jadwal', [AdminController::class, 'jadwal']);
Route::get('/admin/obat', [AdminController::class, 'obat']);
Route::get('/admin/resep', [AdminController::class, 'resep']);

// DOKTER
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

// PASIEN
Route::get('/pasien', [PasienController::class, 'dashboard']);
Route::get('/pasien/booking', [PasienController::class, 'booking']);
Route::get('/pasien/jadwal', [PasienController::class, 'jadwal']);
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::get('/pasien/feedback', [PasienController::class, 'feedback']);
Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis']);