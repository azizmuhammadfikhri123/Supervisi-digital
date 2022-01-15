<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false

]);

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('panel')->group(function(){
        Route::prefix('kurikulum')->group(function(){
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('kurikulum');
            Route::get('/add-account', [App\Http\Controllers\HomeController::class, 'getKurikulum'])->name('add-kurikulum');
            Route::post('/add-account', [App\Http\Controllers\HomeController::class, 'postKurikulum'])->name('post-kurikulum');
            Route::patch('/set-Supervisor/{id}', [App\Http\Controllers\HomeController::class, 'setSupervisor'])->name('set-kurikulum');
            Route::delete('/{id}', [App\Http\Controllers\HomeController::class, 'deleteAccount'])->name('delete');
            Route::patch('/{id}', [App\Http\Controllers\HomeController::class, 'UpdateAccount'])->name('update');

            Route::prefix('jadwal')->group(function(){
                Route::get('/', [HomeController::class, 'listJadwal'])->name('jadwal');
                Route::get('/add-jadwal', [HomeController::class, 'getJadwal'])->name('get-jadwal');
                Route::post('/add-jadwal', [HomeController::class, 'postJadwal'])->name('post-jadwal');
            });

            Route::prefix('rpp')->group(function(){
                Route::get('/list', [HomeController::class, 'listRPP'])->name('list-rpp');
                Route::get('/add', [HomeController::class, 'getRPP'])->name('add-rpp');
                Route::post('/post', [HomeController::class, 'postRPP'])->name('post-rpp');
            });

            Route::prefix('supervisi')->group(function(){
                Route::get('/', [HomeController::class, 'jadwalSupervisi'])->name('supervisi');
            });


        });
        Route::prefix('guru')->group(function(){
            Route::get('/', [GuruController::class, 'index'])->name('guru');
            Route::get('/list-rpp', [GuruController::class, 'listRpp'])->name('listRpp');
            Route::get('/add-rpp', [GuruController::class, 'addRpp'])->name('addRpp');
            Route::post('/post-rpp', [GuruController::class, 'postRpp'])->name('postRpp');
        });

        Route::get('/kepsek', [KepsekController::class, 'index'])->name('kepsek');

    });
});

