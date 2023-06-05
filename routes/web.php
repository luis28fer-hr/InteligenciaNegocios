<?php

use App\Http\Controllers\balance_comprobacionController;
use App\Http\Controllers\balance_generalController;
use App\Http\Controllers\cuentasTController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarjetaController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('login', [LoginController::class, 'login'])->name('login.session');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dash');
Route::get('balance-general', [balance_generalController::class, 'index'])->name('balGeneral');
Route::get('cuentasT', [cuentasTController::class, 'index'])->name('cuentasT');
Route::get('balance-comprobacion', [balance_comprobacionController::class, 'index'])->name('balComprobacion');
//PDF
Route::get('balance-comp', [balance_comprobacionController::class, 'pdf_bcomp'])->name('pdf_bcomp');
