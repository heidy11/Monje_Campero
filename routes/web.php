<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');