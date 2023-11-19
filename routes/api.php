<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\LetterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel', 'index');
    Route::get('/carousel/{id}', 'show');
    Route::post('/carousel', 'store');
    Route::put('/carousel/{id}', 'update');
    Route::delete('/carousel/{id}', 'destroy');
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('/user', 'index');
//     Route::get('/user/{id}', 'show');
//     Route::post('/user', 'store')->name('user.store');
//     Route::put('/user/{id}', 'update')->name('user.update');
//     Route::put('/user/email/{id}', 'email')->name('user.email');
//     Route::put('/user/password/{id}', 'password')->name('user.password');
//     Route::delete('/user/{id}', 'destroy');
// });

Route::controller(LetterController::class)->group(function () {
    Route::get('/letter', 'index');
    Route::get('/letter/{id}', 'show');
    Route::post('/letter', 'store');
    Route::delete('/letter/{id}', 'destroy');
});



