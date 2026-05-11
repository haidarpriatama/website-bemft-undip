<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::prefix('pages')->group(function() {
    Route::get('sejarah', [HomeController::class, 'sejarah'])->name('pages.sejarah');
    Route::get('layanan-inti', [HomeController::class, 'layananinti'])->name('pages.layananinti');
    Route::get('layanan-pendukung', [HomeController::class, 'layananpendukung'])->name('pages.layananpendukung');
    Route::get('bidang-dan-unit', [HomeController::class, 'bidangunit'])->name('pages.bidangunit');
    Route::get('bidang-dan-unit/{slug}', [HomeController::class, 'bidangunit_detail'])->name('pages.bidangunit_detail');
    Route::get('upk', [HomeController::class, 'upk'])->name('pages.upk');
    Route::get('bso', [HomeController::class, 'bso'])->name('pages.bso');
    Route::get('pressrelease', [HomeController::class, 'pressrelease'])->name('pages.pressrelease');
    Route::get('teknik-dalam-angka', [HomeController::class, 'teknikdalamangka'])->name('pages.teknikdalamangka');
    Route::prefix('news')->group(function() {
        Route::get('{type}', [HomeController::class, 'infocahteknik'])->name('news.type');
        Route::get('{type}/{slug}', [HomeController::class, 'post'])->name('news.post');
    });
});
