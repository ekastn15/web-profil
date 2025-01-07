<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UnduhController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    Route::get('edit', 'edit')->middleware('auth')->name('profil.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        
        Route::controller(DinasController::class)->prefix('dinas')->group(function(){
            Route::get('', 'index')->name('dinas');
            Route::get('insert', 'add')->name('dinas.insert');
            Route::post('insert', 'insert')->name('dinas.add.insert');
            Route::get('edit/{id_dinas}', 'edit')->name('dinas.edit');
            Route::put('update/{id_dinas}', 'update')->name('dinas.update');
            Route::delete('delete/{id_dinas}', 'destroy')->name('dinas.delete');
        });
        Route::controller(AuthController::class)->prefix('akun')->group(function(){
            Route::get('', 'index')->name('akun');
            Route::get('insert', 'add')->name('akun.insert');
            Route::post('insert', 'insert')->name('akun.add.insert');
            Route::get('edit/{id_users}', 'edit')->name('akun.edit');
            Route::put('update/{id_users}', 'update')->name('akun.update');
        });
        Route::controller(KaryawanController::class)->prefix('karyawan')->group(function(){
            Route::get('', 'index')->name('karyawan');
            Route::get('insert', 'add')->name('karyawan.insert');
            Route::post('insert', 'insert')->name('karyawan.add.insert');
            Route::get('edit/{id_karyawan}', 'edit')->name('karyawan.edit');
            Route::put('update/{id_karyawan}', 'update')->name('karyawan.update');
            Route::delete('delete/{id_karyawan}', 'destroy')->name('karyawan.delete');
        });
        Route::controller(FaqController::class)->prefix('faq')->group(function(){
            Route::get('', 'index')->name('faq');
            Route::get('insert', 'add')->name('faq.insert');
            Route::post('insert', 'insert')->name('faq.add.insert');
            Route::get('edit/{id_faq}', 'edit')->name('faq.edit');
            Route::put('update/{id_faq}', 'update')->name('faq.update');
            Route::delete('delete/{id_faq}', 'destroy')->name('faq.delete');
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

        Route::controller(ForumController::class)->prefix('feedback')->group(function() {
            Route::get('', 'index')->name('feedback');
            Route::get('export', 'export')->name('feedback.export');
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

Route::controller(GaleriController::class)->prefix('galeri')->group(function() {
    Route::get('', 'index')->name('galeri');
    Route::get('insert', 'add')->name('galeri.insert');
    Route::post('insert', 'insert')->name('galeri.add.insert');
    Route::get('edit/{id_galeri}', 'edit')->name('galeri.edit');
    Route::put('update/{id_galeri}', 'update')->name('galeri.update');
    Route::post('resetImage/{id_galeri}', 'resetImage')->name('galeri.resetImage');
});

Route::controller(VideoController::class)->prefix('video')->group(function() {
    Route::get('', 'index')->name('video');
    Route::get('insert', 'add')->name('video.insert');
    Route::post('insert', 'insert')->name('video.add.insert');
    Route::get('edit/{id_video}', 'edit')->name('video.edit');
    Route::put('update/{id_video}', 'update')->name('video.update');
});


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::controller(HomeController::class)->prefix('home')->group(function(){
    Route::get('/about', 'about')->name('home.about');
    Route::get('/berita', 'berita')->name('home.berita');
    Route::get('/pejabat', 'pejabat')->name('home.pejabat');
    Route::get('/lainnya', 'pegawai')->name('home.lainnya');
    Route::get('/unduh', 'unduh')->name('home.unduh');
    Route::get('/agenda', 'agenda')->name('home.agenda');
    Route::get('/foto', 'foto')->name('home.foto');
    Route::get('/video', 'video')->name('home.video');
    Route::get('/contact', 'contact')->name('home.contact');
    Route::post('/contact', 'insert')->name('home.contact.insert');
    Route::get('/layanan', 'layanan')->name('home.layanan');

});