<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Rute buat bikin akun lewat browser
Route::get('/buat-admin/{nama}/{password}', function ($nama, $password) {
    User::firstOrCreate(
        ['name' => $nama],
        [
            'email' => strtolower(str_replace(' ', '', $nama)) . '@gmail.com',
            'password' => Hash::make($password)
        ]
    );
    return "Akun berhasil dibuat!<br>Nama: <b>$nama</b><br>Password: <b>$password</b><br><br><a href='/sesi'>Klik di sini untuk menuju halaman Login</a>";
});

// Halaman Login (hanya bisa diakses kalau BELUM login)
Route::middleware(['guest'])->group(function () {
    Route::get('/sesi', [SessionController::class, 'index'])->name('login');
    Route::post('/sesi/login', [SessionController::class, 'login']);
});

// Halaman setelah LOGIN
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('beranda');
    });

    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    Route::get('/sesi/logout', [SessionController::class, 'logout']);

    Route::resource('siswas', SiswaController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('pendaftarans', PendaftaranController::class);
});
