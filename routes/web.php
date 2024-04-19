<?php

use App\Http\Controllers\Dashboard\Pages\CityController;
use App\Http\Controllers\Dashboard\Pages\RegionController;
use Illuminate\Support\Facades\App;
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

Route::middleware(['set.locale'])->group(function () {

    Route::get('/{locale}', function () {

        return view('welcome');
    });

    
    Route::get('/{locale}/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/{locale}/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/{locale}/cities', [CityController::class, 'store'])->name('cities.store');
    
    Route::get('/{locale}/regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('/{locale}/regions/create', [RegionController::class, 'create'])->name('regions.create');
    Route::post('/{locale}/regions', [RegionController::class, 'store'])->name('regions.store');
});