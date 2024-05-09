<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Pages\{
    AdviceController,
    CityController,
    DashboardController,
    MajorsController,
    RegionController,
    ServiceProviderController
};



// lang(en, ar)/admins/*
// start Admin routes
Route::middleware(['guest:admin'])->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// (authentication is required)
Route::middleware(['auth:admin'])->group(function () {

        Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
        });




        Route::prefix('cities')->name('cities.')->controller(CityController::class)
        ->group(function () {
        
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{city}/edit', 'edit')->name('edit');  
            Route::patch('{city}', 'update')->name('update'); 
            Route::delete('{city}', 'destroy')->name('destroy'); 
            Route::get('{city}', 'stauts')->name('status'); 
        });

        Route::prefix('regions')->name('regions.')->controller(RegionController::class)
        ->group(function () {
        
            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{region}/edit', 'edit')->name('edit');  
            Route::patch('{region}', 'update')->name('update'); 
            Route::delete('{region}', 'destroy')->name('destroy'); 
            Route::get('{region}', 'stauts')->name('status'); 
        });

        Route::prefix('majors')->name('majors.')->controller(MajorsController::class)
        ->group(function () {
        
            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{major}/edit', 'edit')->name('edit');  
            Route::patch('{major}', 'update')->name('update'); 
            Route::delete('{major}', 'destroy')->name('destroy'); 
            Route::get('{major}', 'stauts')->name('status'); 
        });

        Route::prefix('advices')->name('advices.')->controller(AdviceController::class)
        ->group(function () {
        
            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{advice}/edit', 'edit')->name('edit');  
            Route::patch('{advice}', 'update')->name('update'); 
            Route::delete('{advice}', 'destroy')->name('destroy'); 
            Route::get('{advice}', 'stauts')->name('status');  
        });



        Route::prefix('service_provider')->name('service_provider.')->controller(ServiceProviderController::class)
        ->group(function () {
        
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::patch('{service_provider}', 'update')->name('update'); 
            Route::delete('{service_provider}', 'destroy')->name('destroy'); 
            Route::get('{service_provider}/view', 'show')->name('show'); 
            Route::get('{service_provider}/view-request', 'showRequest')->name('show_request'); 

            Route::get('/requests', 'getRequest')->name('requests');

        });


    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
    //End Admin routes
