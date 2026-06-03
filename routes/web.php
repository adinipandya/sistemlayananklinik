<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

// ======================================================
// HOME
// ======================================================

Route::get('/', [HomeController::class, 'index']);

// ======================================================
// REGISTER
// ======================================================

Route::get('/register', function () {
    return view('auth.register');
});

// ======================================================
// LOGIN
// ======================================================

Route::get('/login', function () {
    return view('auth.login');
});

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

// ======================================================
// LOGOUT
// ======================================================

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ======================================================
// ADMIN
// ======================================================

Route::get('/admin', [AdminController::class, 'dashboard']);

// -------------------- DOKTER --------------------

// TAMPILKAN DATA DOKTER
Route::get('/admin/dokter', [AdminController::class, 'dokter']);

// CRUD DOKTER
Route::post('/admin/dokter/store', [AdminController::class, 'storeDokter']);

Route::put('/admin/dokter/update/{id}', [AdminController::class, 'updateDokter']);

Route::delete('/admin/dokter/delete/{id}', [AdminController::class, 'destroyDokter']);

// -------------------- PASIEN --------------------

// TAMPILKAN DATA PASIEN
Route::get('/admin/pasien', [AdminController::class, 'pasien']);

// CRUD PASIEN
Route::post('/admin/pasien/store', [AdminController::class, 'storePasien']);

Route::put('/admin/pasien/update/{id}', [AdminController::class, 'updatePasien']);

Route::delete('/admin/pasien/delete/{id}', [AdminController::class, 'destroyPasien']);

// SEARCH PASIEN
Route::get('/admin/pasien/search', [AdminController::class, 'pasien'])
    ->name('admin.pasien.search');

// -------------------- MENU ADMIN --------------------

Route::get('/admin/jadwal', [AdminController::class, 'jadwal']);

Route::get('/admin/obat', [AdminController::class, 'obat']);

Route::get('/admin/resep', [AdminController::class, 'resep']);

// ======================================================
// DOKTER
// ======================================================

Route::get('/dokter', [DokterController::class, 'dashboard']);

Route::get('/dokter/jadwal', [DokterController::class, 'jadwal']);

Route::get('/dokter/konsultasi', [DokterController::class, 'konsultasi']);

// DATA PASIEN
Route::get('/dokter/pasien', [DokterController::class, 'pasien']);

// SEARCH PASIEN
Route::get('/dokter/pasien/search', [DokterController::class, 'searchPasien'])
    ->name('dokter.pasien.search');

// KELOLA REKAM MEDIS
Route::get('/dokter/kelola', [DokterController::class, 'kelola']);

// UPDATE REKAM MEDIS
Route::put('/dokter/rekam_medis/{id}', function () {
    return back()->with('success', 'Data berhasil diupdate');
})->name('rekam_medis.update');

// DELETE REKAM MEDIS
Route::delete('/dokter/rekam-medis/{id}', function () {
    return back()->with('success', 'Data berhasil dihapus');
})->name('rekam_medis.destroy');

// ======================================================
// PASIEN
// ======================================================

Route::get('/pasien', [PasienController::class, 'dashboard']);

Route::get('/pasien/booking', [PasienController::class, 'booking']);

Route::get('/pasien/jadwal', [PasienController::class, 'jadwal']);

Route::get('/pasien/profile', [PasienController::class, 'profile']);

Route::get('/pasien/feedback', [PasienController::class, 'feedback']);

Route::get('/pasien/rekam-medis', [PasienController::class, 'rekam_medis']);