<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForumDikusiController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UnduhController;
use App\Http\Controllers\UserController;
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
    return view('auth/login');
})->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::controller(FaqController::class)->prefix('faq')->group(function(){
            Route::get('', 'index')->name('faq');
            Route::get('insert', 'add')->name('faq.insert');
            Route::post('insert', 'insert')->name('faq.add.insert');
            Route::get('edit/{id_faq}', 'edit')->name('faq.edit');
            Route::put('update/{id_faq}', 'update')->name('faq.update');
            Route::delete('delete/{id_faq}', 'destroy')->name('faq.delete');
        });
        
        Route::controller(DinasController::class)->prefix('dinas')->group(function(){
            Route::get('', 'index')->name('dinas');
            Route::get('insert', 'add')->name('dinas.insert');
            Route::post('insert', 'insert')->name('dinas.add.insert');
            Route::get('edit/{id_dinas}', 'edit')->name('dinas.edit');
            Route::put('update/{id_dinas}', 'update')->name('dinas.update');
            Route::delete('delete/{id_dinas}', 'destroy')->name('dinas.delete');
        });
        
        Route::controller(KaryawanController::class)->prefix('karyawan')->group(function(){
            Route::get('', 'index')->name('karyawan');
            Route::get('insert', 'add')->name('karyawan.insert');
            Route::post('insert', 'insert')->name('karyawan.add.insert');
            Route::get('edit/{id_karyawan}', 'edit')->name('karyawan.edit');
            Route::put('update/{id_karyawan}', 'update')->name('karyawan.update');
            Route::delete('delete/{id_karyawan}', 'destroy')->name('karyawan.delete');
        });
        Route::controller(LayananController::class)->prefix('layanan')->group(function(){
            Route::get('', 'index')->name('layanan');
            Route::get('layanan', 'add')->name('layanan.insert');
            Route::post('insert', 'insert')->name('layanan.add.insert');
            Route::get('edit/{id_layanan}', 'edit')->name('layanan.edit');
            Route::put('update/{id_layanan}', 'update')->name('layanan.update');
            Route::delete('delete/{id_layanan}', 'destroy')->name('layanan.delete');
        });
        
        Route::controller(KontakController::class)->prefix('kontak')->group(function(){
            Route::get('', 'index')->name('kontak');
            Route::get('kontak', 'add')->name('kontak.insert');
            Route::post('insert', 'insert')->name('kontak.add.insert');
            Route::get('edit/{id_kontak}', 'edit')->name('kontak.edit');
            Route::put('update/{id_kontak}', 'update')->name('kontak.update');
            Route::delete('delete/{id_kontak}', 'destroy')->name('kontak.delete');
        });
    });
});

Route::get('/dashboard',function () {
    return view('dashboard');
    })->name('dashboard');

Route::controller(AgendaController::class)->prefix('agenda')->group(function(){
    Route::get('', 'index')->name('agenda');
    Route::get('insert', 'add')->name('agenda.insert');
    Route::post('insert', 'insert')->name('agenda.add.insert');
    Route::get('edit/{id_agenda}', 'edit')->name('agenda.edit');
    Route::put('update/{id_agenda}', 'update')->name('agenda.update');
    Route::delete('delete/{id_agenda}', 'destroy')->name('agenda.delete');
});
Route::controller(BeritaController::class)->prefix('berita')->group(function() {
    Route::get('', 'index')->name('berita');
    Route::get('insert', 'add')->name('berita.insert');
    Route::post('insert', 'insert')->name('berita.add.insert');
    Route::get('edit/{id_berita}', 'edit')->name('berita.edit');
    Route::put('update/{id_berita}', 'update')->name('berita.update');
    Route::delete('destroy/{id_berita}', 'destroy')->name('berita.destroy');
});
Route::controller(UnduhController::class)->prefix('unduh')->group(function() {
    Route::get('', 'index')->name('unduh');
    Route::get('insert', 'add')->name('unduh.insert');
    Route::post('insert', 'insert')->name('unduh.add.insert');
    Route::get('edit/{id_dokumen}', 'edit')->name('unduh.edit');
    Route::put('update/{id_dokumen}', 'update')->name('unduh.update');
    Route::delete('destroy/{id_dokumen}', 'destroy')->name('unduh.destroy');
});

Route::controller(ForumDiskusiController::class)->prefix('forumdiskusi')->group(function() {
    Route::get('', 'index')->name('forumdiskusi');
    Route::get('insert', 'insert')->name('forumdiskusi.insert');
    Route::post('store', 'store')->name('forumdiskusi.store');
    Route::get('cetakforumdiskusi', 'cetakforumdikusi')->name('forumdiskusi.cetak-forumdiskusi');
});