<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\StoresController;

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

// 將首頁重新導向至 CarsController 的 index 方法
Route::get('/', [CarsController::class, 'index'])->name('home');

// 顯示所有車輛資料
Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');

// 顯示單一車輛資料
Route::get('/cars/{id}', [CarsController::class, 'show'])->where('id', '[0-9]+')->name('cars.show');

// 修改單一車輛表單
Route::get('/cars/{id}/edit', [CarsController::class, 'edit'])->where('id', '[0-9]+')->name('cars.edit');

// 修改車輛
Route::put('/cars/update/{id}', [CarsController::class, 'update'])->where('id', '[0-9]+')->name('cars.update');

// 刪除單一車輛資料
Route::delete('/cars/{id}', [CarsController::class, 'destroy'])->where('id', '[0-9]+')->name('cars.destroy');

// 新增車輛表單
Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');

// 顯示所有商店資料
Route::get('/stores', [StoresController::class, 'index'])->name('stores.index');

// 顯示單一商店資料
Route::get('/stores/{id}', [StoresController::class, 'show'])->where('id', '[0-9]+')->name('stores.show');

// 修改單一商店表單
Route::get('/stores/{id}/edit', [StoresController::class, 'edit'])->where('id', '[0-9]+')->name('stores.edit');

// 修改商店
Route::put('/stores/update/{id}', [StoresController::class, 'update'])->where('id', '[0-9]+')->name('stores.update');

// 刪除單一商店及其車輛資料
Route::delete('/stores/delete/{id}', [StoresController::class, 'destroy'])->where('id', '[0-9]+')->name('stores.destroy');

// 新增商店表單
Route::get('/stores/create', [StoresController::class, 'create'])->name('stores.create');
