<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectDetailController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin', function () {
    return view('admin/dashboard');
});
Route::group(['middleware' => 'adminauth',], function() {
Route::resource('manager-category',CategoryController::class);
Route::resource('manager-project',ProjectController::class);
Route::resource('manager-news',NewsController::class);
Route::post('category/update_active',[CategoryController::class,'updateActive']);
Route::post('project/update_active',[ProjectController::class,'updateActive']);
Route::post('project/update_status',[ProjectController::class,'updateStatus']);
Route::get('project/uploadiamge/{id}',[ProjectController::class,'uploadImage']);
Route::get('all-news',[NewsController::class,'getAllNews']);
Route::get('news-details/{id}',[NewsController::class,'getDetailsNews']);

Route::get('main-section',[WidgetController::class,'mainSection']);
Route::get('slider/add',[WidgetController::class,'createSlider']);
Route::post('/main-section/update',[WidgetController::class,'update']);
Route::post('/slider/store',[WidgetController::class,'sldierStore']);
});

Route::get('login',[AuthController::class,'login']);
Route::get('register',[AuthController::class,'register']);
Route::post('store-user',[AuthController::class,'storeUser']);

Route::group(['middleware' => 'allCategory',], function() {
    Route::get('project/{slug}={id}',[ProjectDetailController::class,'index']);
    Route::get('',[HomeController::class,'home']);
});
Route::post('confirm_login',[AuthController::class,'confirmLogin']);
Route::group(['middleware' => 'logined',], function() {
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('donate',[DonateController::class,'index']);
    Route::post('vnpay-payment',[DonateController::class,'vnpayPayment']);
    Route::get('donatesuccess',[DonateController::class,'donateSuccess']);
    Route::get('profile',[ProfileController::class,'index']);
    Route::post('confirm-user',[ProfileController::class,'confirmUser']);
    Route::post('create-project',[ProfileController::class,'createProject']);
});

