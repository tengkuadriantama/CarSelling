<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\KendaraanController;

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


Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');




Route::group(['middleware' => ['auth:api']], function () {
    route::get('/user', function (Request $request) 
    {
        return $request->user();
    });

    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/motor', [MotorController::class, 'index']);
    Route::post('/motor/store', [MotorController::class, 'store']);
    Route::get('/motor/{id}', [MotorController::class, 'show']);
    Route::put('/motor/update', [MotorController::class, 'update']);
    Route::delete('/motor/{id}', [MotorController::class, 'delete']);

    Route::get('/mobil', [MobilController::class, 'index']);
    Route::post('/mobil/store', [MobilController::class, 'store']);
    Route::get('/mobil/{id}', [MobilController::class, 'show']);
    Route::put('/mobil/update', [MobilController::class, 'update']);
    Route::delete('/mobil/{id}', [MobilController::class, 'destroy']);

    Route::resource('kendaraan', KendaraanController::class);

    Route::post('/kendaraan/mobil', [KendaraanController::class, 'store']);
    Route::post('/kendaraan/motor', [KendaraanController::class, 'store']);

});
