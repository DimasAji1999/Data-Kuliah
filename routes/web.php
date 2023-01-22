<?php

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

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/keluar',function(){
    \Auth::logout();

    return redirect('/login');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('/siswa','\App\Http\Controllers\Siswa_controller@index');
    Route::get('/siswa/add','\App\Http\Controllers\Siswa_controller@add');
    Route::post('/siswa/add','\App\Http\Controllers\Siswa_controller@store');
    Route::get('/siswa/{id}','\App\Http\Controllers\Siswa_controller@edit');
    Route::put('/siswa/{id}','\App\Http\Controllers\Siswa_controller@update');
    Route::delete('/siswa/{id}','\App\Http\Controllers\Siswa_controller@delete');

    //manage matkul
    Route::get('/matkul','\App\Http\Controllers\Matkul_controller@index');
    Route::get('/matkul/add','\App\Http\Controllers\Matkul_controller@add');
    Route::post('/matkul/add','\App\Http\Controllers\Matkul_controller@store');
    Route::get('/matkul/{id}','\App\Http\Controllers\Matkul_controller@edit');
    Route::put('/matkul/{id}','\App\Http\Controllers\Matkul_controller@update');
    Route::delete('/matkul/{id}','\App\Http\Controllers\Matkul_controller@delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
