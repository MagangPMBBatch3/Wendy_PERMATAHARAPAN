<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BagianController\BagianController;
use App\Http\Controllers\LevelController\LevelController;
use App\Http\Controllers\AktivitasController\AktivitasController;
use App\Http\Controllers\ProyekController\ProyekController;
use App\Http\Controllers\JamKerjaController\JamKerjaController;
use App\Http\Controllers\JamPerTanggalController\JamPerTanggalController;
use App\Http\Controllers\StatusJamKerjaController\StatusJamKerjaController;
use App\Http\Controllers\ModeJamKerjaController\ModeJamKerjaController;
use App\Http\Controllers\UserProfileController\UserProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected resource routes
    Route::get('/bagian', [BagianController::class, 'index'])->name('bagian.index');
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::get('/userprofile', [UserProfileController::class, 'index'])->name('userprofile.index');
    Route::get('/userprofile/profile', [UserProfileController::class, 'profile'])->name('userprofile.profile');
    Route::post('/userprofile/profile', [UserProfileController::class, 'update'])->name('userprofile.update');
    Route::get('/aktivitas', [AktivitasController::class, 'index'])->name('aktivitas.index');
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/jamkerja', [JamKerjaController::class, 'index'])->name('jamkerja.index');
    Route::get('/jampertanggal', [JamPerTanggalController::class, 'index'])->name('jampertanggal.index');
    Route::get('/statusjamkerja', [StatusJamKerjaController::class, 'index'])->name('statusjamkerja.index');
    Route::get('/modejamkerja', [ModeJamKerjaController::class, 'index'])->name('modejamkerja.index');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
