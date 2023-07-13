<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\data_keluargaController;
use App\Http\Controllers\detailController;

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

Route::get('/', [data_keluargaController::class, 'index'])->name('data_keluarga.index');
Route::get('add', [data_keluargaController::class, 'create'])->name('data_keluarga.create'); 
Route::post('store', [data_keluargaController::class, 'store'])->name('data_keluarga.store');
Route::get('edit/{id}', [data_keluargaController::class, 'edit'])->name('data_keluarga.edit'); 
Route::post('update/{id}', [data_keluargaController::class,  'update'])->name('data_keluarga.update');
Route::post('delete/{id}', [data_keluargaController::class,  'delete'])->name('data_keluarga.delete');

Route::get('/detail', [detailController::class, 'index'])->name('detail.index');
Route::get('detail/add', [detailController::class, 'create'])->name('detail.create'); 
Route::post('detail/store', [detailController::class, 'store'])->name('detail.store');
Route::get('detail/edit/{id}', [detailController::class, 'edit'])->name('detail.edit'); 
Route::post('detail/update/{id}', [detailController::class,  'update'])->name('detail.update');
Route::post('detail/delete/{id}', [detailController::class,  'delete'])->name('detail.delete');

// Route::get('', [TestController::class, 'index'])->name('test.index');
// Route::get('add', [TestController::class, 'create'])->name('test.create'); 
// Route::post('store', [TestController::class, 'store'])->name('test.store');
// Route::get('edit/{id}', [TestController::class, 'edit'])->name('test.edit'); 
// Route::post('update/{id}', [TestController::class,  'update'])->name('test.update');
// Route::post('delete/{id}', [TestController::class,  'delete'])->name('test.delete');