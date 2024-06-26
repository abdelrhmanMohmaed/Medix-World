<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Services\Auth\{
    AuthenticatedSessionController,
    RegisteredUserController
};
use App\Http\Controllers\Services\Pages\{
    DashboardController,
    PatientController,
    ProfileController,
    ScheduleController,
};

/*
|--------------------------------------------------------------------------
| Service Provider Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('axios/region/{id}', [ProfileController::class, 'axiosRegion'])->name('axios.region');

// lang (en, ar)/ services
Route::middleware('guest:service_provider')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('axios/region/{id}', [RegisteredUserController::class, 'axiosRegion'])->name('axios.region');


    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

// (authentication is required)
Route::middleware('auth:service_provider')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)
    ->group(function () {

        Route::get('', 'index')->name('index');
    });
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)
    ->group(function () {

        Route::get('', 'index')->name('index');
        Route::get('{service}', 'edit')->name('edit');
        Route::patch('profile/{id}', 'update')->name('update');

    });

    Route::prefix('schedules')->name('schedules.')->controller(ScheduleController::class)
    ->group(function () {

        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
        Route::post('destroy', 'destroy')->name('destroy');
    });

    Route::prefix('patients')->name('patients.')->controller(PatientController::class)
    ->group(function () {

        Route::get('', 'index')->name('index');
        Route::get('{client_id}', 'show')->name('show');
        Route::get('medical-files/download/{file}', 'download')->name('download'); 
        Route::post('{client_id}',  'store')->name('store');  
    });

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});   
