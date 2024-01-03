<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\StoresController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    // 註解一下
    Route::get('/', function () {
        return redirect('cars');
    });

// 車輛相關路由
Route::get('/', [CarsController::class, 'index'])->name('home'); // 將首頁重新導向至 CarsController 的 index 方法

Route::get('/cars', [CarsController::class, 'index'])->name('cars.index'); // 顯示所有車輛資料
Route::get('/cars/white_licenceplate', [CarsController::class, 'white_licenceplate'])->name('cars.white_licenceplate'); // 顯示白牌車輛資料
Route::get('/cars/yellow_licenceplate', [CarsController::class, 'yellow_licenceplate'])->name('cars.yellow_licenceplate'); // 顯示黃牌車輛資料
Route::get('/cars/red_licenceplate', [CarsController::class, 'red_licenceplate'])->name('cars.red_licenceplate'); // 顯示紅牌車輛資料
Route::get('/cars/{id}', [CarsController::class, 'show'])->where('id', '[0-9]+')->name('cars.show'); // 顯示單一車輛資料
Route::get('/cars/{id}/edit', [CarsController::class, 'edit'])->where('id', '[0-9]+')->name('cars.edit'); // 修改單一車輛表單
Route::patch('/cars/update/{id}', [CarsController::class, 'update'])->where('id', '[0-9]+')->name('cars.update'); // 修改車輛
Route::delete('/cars/{id}', [CarsController::class, 'destroy'])->where('id', '[0-9]+')->name('cars.destroy')->middleware('can:admin'); // 刪除單一車輛資料
Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create')->middleware('can:admin'); // 新增車輛表單
Route::post('/cars/store', [CarsController::class, 'store'])->name('cars.store')->middleware('can:admin'); // 儲存新車輛資料

// 商店相關路由
Route::get('/stores', [StoresController::class, 'index'])->name('stores.index'); // 顯示所有商店資料
Route::get('/stores/{id}', [StoresController::class, 'show'])->where('id', '[0-9]+')->name('stores.show'); // 顯示單一商店資料
Route::get('/stores/{id}/edit', [StoresController::class, 'edit'])->where('id', '[0-9]+')->name('stores.edit'); // 修改單一商店表單
Route::patch('/stores/update/{id}', [StoresController::class, 'update'])->where('id', '[0-9]+')->name('stores.update'); // 修改商店
Route::delete('/stores/delete/{id}', [StoresController::class, 'destroy'])->where('id', '[0-9]+')->name('stores.destroy')->middleware('can:admin'); // 刪除單一商店資料
Route::get('/stores/create', [StoresController::class, 'create'])->name('stores.create')->middleware('can:admin'); // 新增商店表單
Route::post('/stores/store', [StoresController::class, 'store'])->name('stores.store')->middleware('can:admin'); // 儲存新商店資料
});

// 認證路由
Auth::routes(); // 使用 Laravel 預設的身份驗證路由

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // 使用者首頁
