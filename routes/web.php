<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('complain', App\Http\Controllers\ComplainController::class);

//Authentication 
Route::get('dashboard', [App\Http\Controllers\AuthController::class, 'dashboard']); 
Route::get('login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::get('register', [App\Http\Controllers\AuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [App\Http\Controllers\AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::post('custom-login', [App\Http\Controllers\AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [App\Http\Controllers\AuthController::class, 'signOut'])->name('signout');


