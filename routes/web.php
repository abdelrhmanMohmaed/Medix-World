<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Auth\{
    
    AuthenticatedSessionController,
    RegisteredUserController
};
use App\Http\Controllers\Web\Pages\{
    ProfileController,
    HomeController,
    ContactUsController,
    MedicalController,
    TermsController
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
Route::get('axios/region/{id}', [HomeController::class, 'axiosRegion'])->name('axios.region');

//Search
Route::prefix('search')->name('search.')->controller(HomeController::class)->group(function () {

    Route::get('service-provider',  'search')->name('service-provider');
    Route::get('service-provider/filter',  'filter')->name('service-provider.filter');
    Route::get('service-provider/{serviceProvider}',  'show')->name('service-provider.show');
});  

// Booking
Route::prefix('booking')->name('booking.')->controller(HomeController::class)->group(function () {

    Route::get('{schedule}/{serviceProvider}', 'booking')->name('service-provider.show');
    Route::post('{schedule}/{serviceProvider}',  'store')->name('service-provider.store');
});  

// Contact Routes
Route::prefix('contact')->name('contact.')->group(function () {

    Route::post('/', [ContactUsController::class, 'store'])->name('store');
});  

// About Routes
Route::prefix('about')->name('about.')->group(function () {

    // Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::view('/', 'web.pages.about.index')->name('index');
});    

// Terms Routes
Route::prefix('terms-of-use')->name('terms.')->group(function () {

    Route::get('/', [TermsController::class, 'index'])->name('index');
});   


// User Routes 
Route::middleware('guest:web')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


// (authentication is required)
Route::middleware('auth:web')->group(function () {

    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::patch('/{user}', [ProfileController::class, 'update'])->name('update');
        Route::post('/book-review', [ProfileController::class, 'bookReview'])->name('book-review');
    });   

    Route::prefix('medicals')->name('medicals.')->group(function () {
 
        Route::get('medical-files/{major}', [MedicalController::class, 'index'])->name('index');
        Route::post('medical-files', [MedicalController::class, 'store'])->name('store'); 
        Route::post('medical-files/update', [MedicalController::class, 'update'])->name('update'); 
        Route::get('medical-files/download/{file}', [MedicalController::class, 'download'])->name('download'); 
        Route::post('medical-files/delete', [MedicalController::class, 'destroy'])->name('destroy'); 
    });    

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});    
