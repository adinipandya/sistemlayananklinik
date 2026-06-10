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

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AUTH (tanpa middleware)
|--------------------------------------------------------------------------
*/

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

    if ($request->password != $request->password_confirmation) {
        return back()->with('error', 'Konfirmasi password tidak cocok.');
    }

    $user->update(['password' => Hash::make($request->password)]);

    return redirect('/login')->with('success', 'Password berhasil diubah.');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN (wajib login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard']);

    // DOKTER
    Route::get('/dokter', [AdminController::class, 'dokter']);
    Route::post('/dokter', [AdminController::class, 'storeDokter']);
    Route::post('/dokter/store', [AdminController::class, 'storeDokter']);
    Route::put('/dokter/update/{id}', [AdminController::class, 'updateDokter']);
    Route::delete('/dokter/delete/{id}', [AdminController::class, 'destroyDokter']);

    // PASIEN
    Route::get('/pasien', [AdminController::class, 'pasien']);
    Route::post('/pasien/store', [AdminController::class, 'storePasien']);
    Route::put('/pasien/update/{id}', [AdminController::class, 'updatePasien']);
    Route::delete('/pasien/delete/{id}', [AdminController::class, 'destroyPasien']);
    Route::put('/pasien/{id}/verifikasi', [AdminController::class, 'verifikasiPasien']);

    // MENU ADMIN
    Route::get('/jadwal', [AdminController::class, 'jadwal']);
    Route::get('/obat', [AdminController::class, 'obat']);
    Route::get('/resep', [AdminController::class, 'resep']);
    Route::get('/feedback', [AdminController::class, 'feedback']);
    Route::put('/feedback/{id}', [AdminController::class, 'updateFeedback']);

    // OBAT
    Route::post('/obat/store', [AdminController::class, 'storeObat'])->name('obat.store');
    Route::put('/obat/{id}', [AdminController::class, 'updateObat'])->name('obat.update');
    Route::delete('/obat/{id}', [AdminController::class, 'destroyObat'])->name('obat.destroy');
});

/*
|--------------------------------------------------------------------------
| DOKTER (wajib login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('dokter')->group(function () {

    Route::get('/', [DokterController::class, 'dashboard']);
    Route::get('/jadwal', [DokterController::class, 'jadwal']);
    Route::get('/pasien', [DokterController::class, 'datapasien']);
    Route::get('/kelola', [DokterController::class, 'kelola']);
    Route::get('/profile', [DokterController::class, 'profile']);
    Route::get('/password', [DokterController::class, 'password']);
    Route::get('/resep', [DokterController::class, 'resep'])->name('resep.index');
    Route::get('/pengaturan', function () { return view('dokter.pengaturan'); });

    Route::post('/profile', [DokterController::class, 'updateProfile']);
    Route::post('/profile/delete-photo', [DokterController::class, 'deletePhoto']);

    Route::post('/jadwal/batal/{id}', [DokterController::class, 'batalkanJadwal'])->name('jadwal.batal');

    Route::get('/konsultasi/{id?}', [DokterController::class, 'konsultasi'])->name('dokter.konsultasi');
    Route::post('/konsultasi/{id}/simpan', [DokterController::class, 'simpanRekamMedis'])->name('rekam-medis.store');

    Route::get('/rekam-medis/detail/{id}', [DokterController::class, 'detailRekamMedis'])->name('rekam-medis.detail');
    Route::get('/rekam-medis/edit/{id}', [DokterController::class, 'editRekamMedis'])->name('rekam-medis.edit');
    Route::get('/rekam-medis/print', function () { return view('dokter.print_rekam'); });
    Route::put('/rekam-medis/update/{id}', [DokterController::class, 'updateRekamMedis'])->name('rekam-medis.update');
    Route::delete('/rekam-medis/{id}', function () {
        return back()->with('success', 'Data berhasil dihapus');
    })->name('rekam_medis.destroy');

    Route::get('/resep/{id}', [DokterController::class, 'detailResep'])->name('resep.detail');
});

/*
|--------------------------------------------------------------------------
| PASIEN (wajib login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('pasien')->group(function () {

    Route::get('/', [PasienController::class, 'dashboard']);
    Route::get('/jadwal', [PasienController::class, 'jadwal']);
    Route::get('/profile', [PasienController::class, 'profile']);
    Route::get('/riwayat', [PasienController::class, 'riwayat_konsultasi']);
    Route::get('/rekam-medis', [PasienController::class, 'rekam_medis']);

    Route::get('/booking', [PasienController::class, 'booking']);
    Route::post('/booking', [PasienController::class, 'storeBooking'])->name('pasien.booking.store');

    Route::get('/feedback', [PasienController::class, 'feedback']);
    Route::post('/feedback', [PasienController::class, 'storeFeedback']);
    Route::put('/feedback/{id}', [PasienController::class, 'updateFeedback']);
    Route::delete('/feedback/{id}', [PasienController::class, 'destroyFeedback']);
});