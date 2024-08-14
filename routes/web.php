<?php

use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
    Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
    Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
    Route::get('/departemen/edit/{id}/{key}', [DepartemenController::class, 'edit'])->name('departemen.edit');
    Route::post('/departemen/update/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
    Route::delete('/departemen/delete/{id}', [DepartemenController::class, 'delete'])->name('departemen.delete');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/jabatan/edit/{id}/{key}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::post('/jabatan/update/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'delete'])->name('jabatan.delete');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::get('/karyawan/show/{id}/{key}', [KaryawanController::class, 'show'])->name('karyawan.show');
    Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/edit/{id}/{key}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');
    Route::get('/karyawan/cetak', [KaryawanController::class, 'cetak'])->name('karyawan.cetak');

    Route::get('/profil/index', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
});

Route::get('/login', [LoginController::class, 'formLogin'])->name('login.formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'formRegister'])->name('login.formRegister');