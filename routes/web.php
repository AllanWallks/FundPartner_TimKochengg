<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\DetailUsahaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Auth::routes();

Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get("/home", []);
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//MITRA
// Route::group(['as' => 'mitra.', 'prefix' => 'mitra'], function () {
Route::get('/indexmitra', [MitraController::class, 'index'])->name('index');
Route::get('/form_umkm', [MitraController::class, 'create'])->name('create');

//form mitra
Route::post('/store_umkm', [MitraController::class, 'store'])->name('store');
Route::get('/editUsaha/{id}', [DetailUsahaController::class, 'edit']);
Route::post('/updateUsaha/{id}', [DetailUsahaController::class, 'update'])->name('updateUsaha');
Route::delete('/destroyUsaha/{id}', [DetailUsahaController::class, 'destroy'])->name('destroyUsaha');

Route::get('/usaha/{id}', [DetailUsahaController::class, 'showDetailUsaha2'])->name('detailUsaha');
Route::get('/rincian', [PembayaranController::class, 'show'])->name('rincianInvestment');
Route::get('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
Route::post('/bayar/{id}', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
Route::post('/tagihan/{id}', [MitraController::class, 'tagihan'])->name('tagihan');

// });

// INVESTOR
Route::get('investor-page', [InvestorController::class, 'index']);
Route::get('investor-page/pembayaran/{id}', [InvestorController::class, 'payment']);
Route::post('bayar-sekarang/{id}', [InvestorController::class, 'handlePayment']);
Route::get('investor-page/transaksi', [InvestorController::class, 'historyTransaction']);

// LUPA PASSWORD
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// TOP-UP
Route::get('/topup', [ProfilController::class, 'showTopupForm'])->name('topup.form');
Route::post('/topup', [ProfilController::class, 'processTopup'])->name('topup.process');

// UPLOAD KTP & FOTO
Route::get('/upload', [ProfilController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [ProfilController::class, 'processUpload'])->name('upload.process');
