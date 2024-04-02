<?php

use App\Livewire\Dashboard;
use App\Livewire\Dashboard\BukuYangDipinjam;
use App\Livewire\Dashboard\KelolaBuku;
use App\Livewire\Dashboard\KoleksiPribadi;
use App\Livewire\Dashboard\LaporanPeminjaman;
use App\Livewire\Dashboard\PetugasDanAdmin;
use App\Livewire\Dashboard\PinjamBuku;
use App\Livewire\Dashboard\TambahAdminPetugas;
use App\Livewire\Dashboard\TambahBuku;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

// all
Route::get('dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

// user
Route::get('pinjambuku/{id}', PinjamBuku::class)->middleware(['auth', 'verified'])->name('pinjambuku');
Route::get('bukuyangdipinjam', BukuYangDipinjam::class)->middleware(['auth', 'verified'])->name('bukuyangdipinjam');
Route::get('koleksipribadi', KoleksiPribadi::class)->middleware(['auth', 'verified'])->name('koleksipribadi');

// Admin and Petugas
Route::get('laporanpeminjaman', LaporanPeminjaman::class)->middleware(['auth', 'verified'])->name('laporanpeminjaman');
Route::get('tambabhbuku', TambahBuku::class)->middleware(['auth', 'verified'])->name('tambahbuku');
Route::get('kelolabuku/{id}', KelolaBuku::class)->middleware(['auth', 'verified'])->name('kelolabuku');

// admin
Route::get('petugasdanadmin', PetugasDanAdmin::class)->middleware(['auth', 'verified'])->name('petugasdanadmin');
Route::get('buatakun', TambahAdminPetugas::class)->middleware(['auth', 'verified'])->name('buatakun');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
