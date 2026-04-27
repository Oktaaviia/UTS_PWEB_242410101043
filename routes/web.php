<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login: GET menampilkan form, POST memproses username
Route::get('/',       [PageController::class, 'tampilLogin'])->name('login');
Route::post('/login', [PageController::class, 'prosesLogin'])->name('login.proses');

// Halaman utama setelah login
Route::get('/dashboard',   [PageController::class, 'tampilDashboard'])->name('dashboard');
Route::get('/profile',     [PageController::class, 'tampilProfile'])->name('profile');
Route::get('/pengelolaan', [PageController::class, 'tampilPengelolaan'])->name('pengelolaan');

// Logout: hapus session balik ke login
Route::post('/logout', [PageController::class, 'logout'])->name('logout');
