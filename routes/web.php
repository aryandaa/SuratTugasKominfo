<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SuratController;
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

Route::get('/', function () {
    return view('welcome'); });

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class,'index'])->name('login');
    Route::post('/login', [SesiController::class,'login']);    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [SuratController::class, 'index']);
    Route::get('/surat/create', [SuratController::class, 'create']);
    Route::post('/surat/store', [SuratController::class, 'store']);
    Route::get('/surat/{id}/edit', [SuratController::class, 'edit']);
    Route::put('/surat/{id}', [SuratController::class, 'update']);
    Route::get('/surat/{id}/delete', [SuratController::class, 'delete']);
    Route::delete('/surat/{id}/destroy', [SuratController::class, 'destroy']);
    Route::get('/surat/{id}/cetak_pdf', [SuratController::class, 'cetak_pdf']);
    Route::get('/surat/{id}/download_pdf', [SuratController::class, 'download_pdf']);
    Route::get('/surat/riwayat', [SuratController::class, 'riwayat']);

    Route::get('/logout', [SesiController::class, 'logout']);  
    Route::get('/profile/admin',[AdminController::class, 'admin']);
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::post('/admin/store', [AdminController::class, 'store']);
    Route::get('/admin/{id}/view', [AdminController::class, 'view']);
    Route::get('/admin/{id}/ubah', [AdminController::class, 'ubah']);
    Route::put('/admin/{id}/', [AdminController::class, 'update']);
    Route::get('/admin/{id}/delete', [AdminController::class, 'delete']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
});

