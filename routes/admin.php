<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Pages\{
    AdminController,
    AdviceController, 
    CityController,
    DashboardController,
    MajorsController,
    PermissionController,
    RegionController,
    RoleController,
    ServiceProviderController,
    TermsAndCondtionController,
    UserController,
    ContactUsController
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

    Route::prefix('admins')->name('admins.')->controller(AdminController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('{user}/view', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::patch('{user}', 'update')->name('update');
            Route::delete('{user}', 'destroy')->name('destroy');
        });

    Route::prefix('cities')->name('cities.')->controller(CityController::class)
        ->group(function () {
    
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{city}/edit', 'edit')->name('edit');
                Route::patch('{city}', 'update')->name('update');
                Route::delete('{city}', 'destroy')->name('destroy');
                Route::get('{city}', 'status')->name('status');
                Route::get('/{city}/regions', 'getRejions')->name('regions');
        });

    Route::prefix('regions')->name('regions.')->controller(RegionController::class)
        ->group(function () {
    
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{region}/edit', 'edit')->name('edit');
                Route::patch('{region}', 'update')->name('update');
                Route::delete('{region}', 'destroy')->name('destroy');
                Route::get('{region}', 'status')->name('status');
        });

    Route::prefix('roles')->name('roles.')->controller(RoleController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{role}/edit', 'edit')->name('edit');
            Route::patch('{role}', 'update')->name('update');
            Route::delete('{role}', 'destroy')->name('destroy');
            Route::get('{role}/view', 'show')->name('show');
        });

    Route::prefix('majors')->name('majors.')->controller(MajorsController::class)
        ->group(function () {
    
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{major}/edit', 'edit')->name('edit');
                Route::patch('{major}', 'update')->name('update');
                Route::delete('{major}', 'destroy')->name('destroy');
                Route::get('{major}', 'status')->name('status');
        });

    Route::prefix('advices')->name('advices.')->controller(AdviceController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{advice}/edit', 'edit')->name('edit');
            Route::patch('{advice}', 'update')->name('update');
            Route::delete('{advice}', 'destroy')->name('destroy');
            Route::get('{advice}', 'status')->name('status');
            Route::get('{advice}/view', 'show')->name('show');
        });

    Route::prefix('terms')->name('terms.')->controller(TermsAndCondtionController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{term}/edit', 'edit')->name('edit');
            Route::patch('{term}', 'update')->name('update');
            Route::delete('{term}', 'destroy')->name('destroy');
            Route::get('{term}', 'status')->name('status');
            Route::get('{term}/view', 'show')->name('show');
        });

    Route::prefix('service_provider')->name('service_provider.')->controller(ServiceProviderController::class)
        ->group(function () {

            Route::get('/requests/{status}', 'getRequest')->name('requests');
            Route::get('{service_provider}/view-request', 'showRequest')->name('show_request');
            Route::get('{service_provider}/view', 'show')->name('show');
            Route::patch('{service_provider}/{oldStatus?}', 'update')->name('update');
        
 




            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');


            Route::delete('{service_provider}', 'destroy')->name('destroy');
            
        });

    Route::prefix('users')->name('users.')->controller(UserController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('{user}/view', 'show')->name('show');
            Route::post('', 'store')->name('store');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::patch('{user}', 'update')->name('update');
            Route::delete('{user}', 'destroy')->name('destroy');
            Route::get('{user}', 'status')->name('status');
        });

    Route::prefix('messages')->name('messages.')->controller(ContactUsController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::patch('{message}', 'update')->name('update');
            Route::delete('{message}', 'destroy')->name('destroy');
            Route::get('{message}/view', 'show')->name('show');
        });








    Route::prefix('permissions')->name('permissions.')->controller(PermissionController::class)
        ->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{permission}/edit', 'edit')->name('edit');
            Route::patch('{permission}', 'update')->name('update');
            Route::delete('{permission}', 'destroy')->name('destroy');
        });

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
    //End Admin routes
