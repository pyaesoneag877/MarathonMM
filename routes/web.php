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

Route::get('/city/create', [CityController::class,'create'])->middleware('auth');
Route::post('/city/store', [CityController::class,'store'])->middleware('auth');
Route::get('/zone/create', [ZoneController::class,'create'])->middleware('auth');
Route::post('/zone/store', [ZoneController::class,'store'])->middleware('auth');
Route::get('/customer/create', [CustomerController::class,'create'])->middleware('auth');
Route::post('/customer/store', [CustomerController::class,'store'])->middleware('auth');
Route::get('/user/create', [AuthController::class,'create'])->middleware('auth');
Route::post('/user/store', [AuthController::class,'store']);

Route::get('/city/{city}/edit', [CityController::class,'edit'])->middleware('auth');
Route::patch('/city/{city}/update', [CityController::class,'update'])->middleware('auth');
Route::get('/zone/{zone}/edit', [ZoneController::class,'edit'])->middleware('auth');
Route::patch('/zone/{zone}/update', [ZoneController::class,'update'])->middleware('auth');
Route::get('/customer/{customer}/edit', [CustomerController::class,'edit'])->middleware('auth');
Route::patch('/customer/{customer}/update', [CustomerController::class,'update'])->middleware('auth');
Route::get('/user/{user}/edit', [AuthController::class,'edit'])->middleware('auth');
Route::patch('/user/{user}/update', [AuthController::class,'update'])->middleware('auth');

Route::get('/user/register', [AuthController::class,'register'])->middleware('guest');
Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::delete('/city/{city}/delete',[CityController::class,'destroy'])->middleware('auth');
Route::delete('/user/{user}/delete',[AuthController::class,'destroy'])->middleware('auth');
Route::delete('/customer/{customer}/delete',[CustomerController::class,'destroy'])->middleware('auth');
Route::delete('/zone/{zone}/delete',[ZoneController::class,'destroy'])->middleware('auth');
