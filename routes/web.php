<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ZoneController;
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

Route::get('/', [CustomerController::class,'index']);
Route::get('/city', [CityController::class,'index']);
Route::get('/zone', [ZoneController::class,'index']);
Route::get('/user', [AuthController::class,'index']);

Route::delete('/city/{city}/delete',[CityController::class,'destroy']);
Route::delete('/user/{user}/delete',[AuthController::class,'destroy']);
Route::delete('/customer/{customer}/delete',[CustomerController::class,'destroy']);
Route::delete('/zone/{zone}/delete',[ZoneController::class,'destroy']);
