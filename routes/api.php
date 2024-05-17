<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IzinController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AttendanceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/izin', [IzinController::class, 'store']);

Route::get('profile/{name}', [ProfileController::class, 'getUserProfileByName']);
Route::put('profile/{name}', [ProfileController::class, 'updateUserProfile']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/izin', [IzinController::class, 'store']);
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::get('/get-presensi',  [App\Http\Controllers\API\AttendanceController::class, 'getPresensis']);
    Route::post('/save-presensi', [App\Http\Controllers\API\AttendanceController::class, 'savePresensi']);
    Route::post('/jampulang', [App\Http\Controllers\API\AttendanceController::class, 'jampulang'])->name('jampulang');

    
});