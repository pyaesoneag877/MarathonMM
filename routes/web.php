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

Route::get('/city/create', [CityController::class,'create']);
Route::post('/city/store', [CityController::class,'store']);
Route::get('/zone/create', [ZoneController::class,'create']);
Route::post('/zone/store', [ZoneController::class,'store']);
Route::get('/customer/create', [CustomerController::class,'create']);
Route::post('/customer/store', [CustomerController::class,'store']);
Route::get('/user/create', [AuthController::class,'create']);
Route::post('/user/store', [AuthController::class,'store']);

Route::get('/city/{city}/edit', [CityController::class,'edit']);
Route::patch('/city/{city}/update', [CityController::class,'update']);
Route::get('/zone/{zone}/edit', [ZoneController::class,'edit']);
Route::patch('/zone/{zone}/update', [ZoneController::class,'update']);
Route::get('/customer/{customer}/edit', [CustomerController::class,'edit']);
Route::patch('/customer/{customer}/update', [CustomerController::class,'update']);

Route::get('/user/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'login']);
Route::post('/login', [AuthController::class,'post_login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::delete('/city/{city}/delete',[CityController::class,'destroy']);
Route::delete('/user/{user}/delete',[AuthController::class,'destroy']);
Route::delete('/customer/{customer}/delete',[CustomerController::class,'destroy']);
Route::delete('/zone/{zone}/delete',[ZoneController::class,'destroy']);
