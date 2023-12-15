<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ApiController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::controller(StudentController::class)->prefix('student')->group(function(){
    Route::get('','index')->name('student'); 
    Route::get('create','create')->name('student.create');
    Route::post('store','store')->name('student.store');
    Route::get('edit/{id}','edit')->name('student.edit');
    Route::put('edit/{id}','update')->name('student.update');
    Route::delete('destroy/{id}','destroy')->name('student.destroy');
    Route::get('search','index')->name('student.search');
    Route::post('import','import')->name('student.import');
   });

    Route::get('/profile',[\App\Http\Controllers\Api\ApiController::class, 'profile'])->name('profile');
});


