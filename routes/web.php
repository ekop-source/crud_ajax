<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController; //load controller yang akan digunakan
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

Route::get('/', [PenjualanController::class, 'index']);

Route::resource('/penjualan','PenjualanController')->except(['show']);
Route::post('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
Route::get('/penjualan/input', [PenjualanController::class, 'input'])->name('penjualan.input');
Route::post('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::get('/penjualan/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('/penjualan/update', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/destroy/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');