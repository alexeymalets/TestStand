<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\LotteryController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/lottery', [\App\Http\Controllers\LotteryController::class, 'lottery'])->middleware(['auth'])->name('lottery');

Route::get('/convert/{win}', [\App\Http\Controllers\LotteryController::class, 'convert'])->middleware(['auth'])->name('convert');


require __DIR__.'/auth.php';
