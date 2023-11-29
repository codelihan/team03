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

Route::get('/', [CarsController::class, 'index'])->name('Cars.index');

Route::get('/cars', [CarsController::class, 'index'])->name('Cars.index');

Route::get('/stores', [StoresController::class, 'index'])->name('Stores.index');
