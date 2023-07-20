<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JenisBiotaController;
use App\Http\Controllers\BiotaController;
use App\Http\Controllers\JenisTemuanNelayanController;
use App\Http\Controllers\KondisiPerairanController;
use App\Http\Controllers\LaporanNelayanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TrackDetailController;
use App\Http\Controllers\UserController;
use App\Models\JenisTemuanNelayan;
use App\Models\Track;

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

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
Route::group(['prefix' => 'jenis-biota', 'as' => 'jenis-biota.'], function () {
    Route::get('/', [JenisBiotaController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [JenisBiotaController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [JenisBiotaController::class,'show'])->name('show');
    Route::get('/edit/{id}', [JenisBiotaController::class,'edit'])->name('edit');
    Route::get('/create', [JenisBiotaController::class,'create'])->name('create');
    Route::post('/store', [JenisBiotaController::class,'store'])->name('store');
    Route::post('/update/{id}', [JenisBiotaController::class,'update'])->name('update');
});

Route::group(['prefix' => 'biota', 'as' => 'biota.'], function () {
    Route::get('/', [BiotaController::class,'index'])->name('index');
    Route::get('/nelayan', [BiotaController::class,'indexNelayan'])->name('index.nelayan');
    Route::get('/destroy/{id}', [BiotaController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [BiotaController::class,'show'])->name('show');
    Route::get('/edit/{id}', [BiotaController::class,'edit'])->name('edit');
    Route::get('/create', [BiotaController::class,'create'])->name('create');
    Route::post('/store', [BiotaController::class,'store'])->name('store');
    Route::post('/update/{id}', [BiotaController::class,'update'])->name('update');
});

Route::group(['prefix' => 'jenis-temuan', 'as' => 'jenis-temuan.'], function () {
    Route::get('/', [JenisTemuanNelayanController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [JenisTemuanNelayanController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [JenisTemuanNelayanController::class,'show'])->name('show');
    Route::get('/edit/{id}', [JenisTemuanNelayanController::class,'edit'])->name('edit');
    Route::get('/create', [JenisTemuanNelayanController::class,'create'])->name('create');
    Route::post('/store', [JenisTemuanNelayanController::class,'store'])->name('store');
    Route::post('/update/{id}', [JenisTemuanNelayanController::class,'update'])->name('update');
});

Route::group(['prefix' => 'lokasi', 'as' => 'lokasi.'], function () {
    Route::get('/', [LokasiController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [LokasiController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [LokasiController::class,'show'])->name('show');
    Route::get('/edit/{id}', [LokasiController::class,'edit'])->name('edit');
    Route::get('/create', [LokasiController::class,'create'])->name('create');
    Route::post('/store', [LokasiController::class,'store'])->name('store');
    Route::post('/update/{id}', [LokasiController::class,'update'])->name('update');
});

Route::group(['prefix' => 'laporan-nelayan', 'as' => 'laporan-nelayan.'], function () {
    Route::get('/', [LaporanNelayanController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [LaporanNelayanController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [LaporanNelayanController::class,'show'])->name('show');
    Route::get('/edit/{id}', [LaporanNelayanController::class,'edit'])->name('edit');
    Route::get('/create', [LaporanNelayanController::class,'create'])->name('create');
    Route::post('/store', [LaporanNelayanController::class,'store'])->name('store');
    Route::post('/update/{id}', [LaporanNelayanController::class,'update'])->name('update');
});

Route::get('/lihat-kondisi-perairan', [KondisiPerairanController::class,'indexNelayan'])->name('indexNelayan');
Route::group(['prefix' => 'kondisi-perairan', 'as' => 'kondisi-perairan.'], function () {
    Route::get('/', [KondisiPerairanController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [KondisiPerairanController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [KondisiPerairanController::class,'show'])->name('show');
    Route::get('/edit/{id}', [KondisiPerairanController::class,'edit'])->name('edit');
    Route::get('/create', [KondisiPerairanController::class,'create'])->name('create');
    Route::post('/store', [KondisiPerairanController::class,'store'])->name('store');
    Route::post('/update/{id}', [KondisiPerairanController::class,'update'])->name('update');
});


Route::get('/lihat-report-biota', [TrackController::class,'indexNelayan'])->name('indexNelayan');
Route::group(['prefix' => 'track', 'as' => 'track.'], function () {
    Route::get('/', [TrackController::class,'index'])->name('index');
    Route::get('/destroy/{id}', [TrackController::class,'destroy'])->name('destroy');
    Route::get('/show{id}', [TrackController::class,'show'])->name('show');
    Route::get('/edit/{id}', [TrackController::class,'edit'])->name('edit');
    Route::get('/create', [TrackController::class,'create'])->name('create');
    Route::post('/store', [TrackController::class,'store'])->name('store');
    Route::post('/update/{id}', [TrackController::class,'update'])->name('update');

    Route::group(['prefix' => 'detail/{id}', 'as' => 'detail.'], function () {
        Route::get('/', [TrackDetailController::class,'index'])->name('index');
        Route::get('/destroy/{detail}', [TrackDetailController::class,'destroy'])->name('destroy');
        Route::get('/show{detail}', [TrackDetailController::class,'show'])->name('show');
        Route::get('/edit/{detail}', [TrackDetailController::class,'edit'])->name('edit');
        Route::get('/create', [TrackDetailController::class,'create'])->name('create');
        Route::post('/store', [TrackDetailController::class,'store'])->name('store');
        Route::post('/update/{detail}', [TrackDetailController::class,'update'])->name('update');
    });
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


});


Route::get('/', function () {
    return view('landing');
});
Auth::routes();