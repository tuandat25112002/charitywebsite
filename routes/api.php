<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\NewsController;
use App\Http\Controllers\DonateController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user',[AuthController::class,'user']);
    Route::get('/logout',[AuthController::class,'logout']);
});

Route::resource('customer',CustomerController::class);
Route::prefix('v1')->group(function(){
    Route::resource('news',NewsController::class);
    Route::resource('category',CategoryController::class);
    Route::get('projects',[ProjectController::class,'filterProject']);
    Route::resource('project',ProjectController::class);
    Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('vnpay-payment',[DonateController::class,'vnpayPaymentAPI']);
    Route::get('donatesuccess',[DonateController::class,'donateSuccessAPI']);
});

