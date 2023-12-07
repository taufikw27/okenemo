<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangInController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/lupa-password', [AuthController::class, 'lupapas'])->name('lupapas');
Route::get('/password-baru', [AuthController::class, 'passbaru'])->name('passbaru');
Route::post('/password-baru', [AuthController::class, 'passbaruSub'])->name('passbaruSub');
Route::post('/lupa-password', [AuthController::class, 'lupapasSub'])->name('lupapas.sub');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('registersub');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.sub');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/barangIN', [BarangInController::class, 'index'])->name('barangIN.index');
    Route::post('/barangIN', [BarangInController::class, 'create'])->name('barangIN.create');
    // Route::put('/barangIN/{id}', [BarangInController::class, 'update'])->name('barangIN.update');
    // Route::delete('/barangIN/{id}', [BarangInController::class, 'destroy'])->name('barangIN.destroy');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'create'])->name('barang.create');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users', [UsersController::class, 'create'])->name('users.create');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.delete');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
