<?php

use Illuminate\Support\Facades\Route;
use App\Models\Karyawan;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Models\Gaji;
use App\Http\Controllers\sesiController;






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
//untuk login dan logout
Route::middleware(['guest'])->group(function(){
Route::get('/',[sesiController::class,'index'])->name('login');
Route::post('/',[sesiController::class,'login']);
});
Route::get('/home',function(){
    return redirect('/karyawan');
});

//untuk role

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('userAkses:admin');
Route::get('/gaji', [GajiController::class, 'index'])->middleware('userAkses:staf');
    Route::post('/logout', [sesiController::class, 'logout'])->name('logout');
});



//karyawan
Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawans}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

//gaji
Route::get('gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create_gaji');
Route::post('gaji', [GajiController::class, 'store'])->name('gaji.store');
Route::get('/gajis/{id}', [GajiController::class, 'edit'])->name('gaji.edit');
Route::put('/gaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
Route::delete('/gaji/{gajis}', [GajiController::class, 'destroy'])->name('gaji.destroy');
