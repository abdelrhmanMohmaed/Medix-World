<?php

use App\Http\Controllers\Web\Auth\{
    
    AuthenticatedSessionController,
    RegisteredUserController
};
use App\Http\Controllers\Web\Pages\{
    ProfileController,
    HomeController
};
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


// Landing page
Route::get('/',[HomeController::class, 'index'])->name('welcome');


// lang (en, ar)/
// User Routes 
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


// (authentication is required)
Route::middleware('auth:web')->group(function () {

    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('index');
    });    


    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});    
