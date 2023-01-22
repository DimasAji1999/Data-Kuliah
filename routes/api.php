<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\Matkulcontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//API route for register new user
Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // Siswa
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index']);
        Route::get('/show/{id}', [SiswaController::class, 'show']);
        Route::post('/store', [SiswaController::class, 'store']);
        Route::post('/update/{id}', [SiswaController::class, 'update']);
    });
    // Matkul
    Route::prefix('matkul')->group(function () {
        Route::get('/', [Matkulcontroller::class, 'index']);
        Route::get('/show/{id}', [Matkulcontroller::class, 'show']);
        Route::post('/store', [Matkulcontroller::class, 'store']);
        Route::post('/update/{id}', [Matkulcontroller::class, 'update']);
        Route::delete('/delete/{id}', [Matkulcontroller::class, 'destroy']);
    });
});