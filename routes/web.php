<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TravelPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CulinaryController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\TravelGuideController;
use App\Http\Controllers\BestTimeController;
use App\Http\Controllers\PlanYourTripController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegionController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/destinations', [DestinationController::class, 'index'])
    ->name('destinations.index');

Route::get('/destinations/{slug}', [DestinationController::class, 'show'])
    ->name('destinations.show');

Route::get('/provinces', [ProvinceController::class, 'index'])
    ->name('provinces.index');

Route::get('/provinces/{slug}', [ProvinceController::class, 'show'])
    ->name('provinces.show');

Route::get('/regions/{slug}', [RegionController::class, 'show'])
    ->name('regions.show');

Route::get('/regions/{slug}/{category}', [RegionController::class, 'category'])
    ->name('regions.category');

Route::get('/travel-experience', [TravelPostController::class, 'index'])
    ->name('travel-posts.index');

Route::get('/travel-experience/create', [TravelPostController::class, 'create'])
    ->middleware('auth')
    ->name('travel-posts.create');

Route::post('/travel-experience', [TravelPostController::class, 'store'])
    ->middleware('auth')
    ->name('travel-posts.store');

Route::get('/travel-experience/{id}', [TravelPostController::class, 'show'])
    ->name('travel-posts.show');

Route::delete('/travel-experience/{id}', [TravelPostController::class, 'destroy'])
    ->middleware('auth')
    ->name('travel-posts.destroy');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/culinary', [CulinaryController::class, 'index'])
    ->name('culinary.index');

Route::get('/culinary/{slug}', [CulinaryController::class, 'show'])
    ->name('culinary.show');

Route::get('/culture', [CultureController::class, 'index'])
    ->name('culture.index');

Route::get('/travel-guide', [TravelGuideController::class, 'index'])
    ->name('travel-guide.index');

Route::get('/best-time', [BestTimeController::class, 'index'])
    ->name('best-time.index');

Route::get('/plan-your-trip', [PlanYourTripController::class, 'index'])
    ->name('plan-your-trip.index');

Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');
// Culture Sub-pages
Route::get('/culture/heritage', [CultureController::class, 'heritage'])->name('culture.heritage');
Route::get('/culture/traditions', [CultureController::class, 'traditions'])->name('culture.traditions');
Route::get('/culture/arts', [CultureController::class, 'arts'])->name('culture.arts');

// Travel Guide Sub-pages
Route::get('/travel-guide/getting-around', [TravelGuideController::class, 'gettingAround'])->name('travel-guide.getting-around');
Route::get('/travel-guide/before-you-go', [TravelGuideController::class, 'beforeYouGo'])->name('travel-guide.before-you-go');
Route::get('/travel-guide/tips', [TravelGuideController::class, 'tips'])->name('travel-guide.tips');

// Plan Your Trip Sub-pages
Route::get('/plan-your-trip/nature-escape', [PlanYourTripController::class, 'nature'])->name('plan-your-trip.nature');
Route::get('/plan-your-trip/culture-heritage', [PlanYourTripController::class, 'culture'])->name('plan-your-trip.culture');
Route::get('/plan-your-trip/culinary-journey', [PlanYourTripController::class, 'culinary'])->name('plan-your-trip.culinary');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('register.store');
Route::post('/destinations/{slug}/reviews', [App\Http\Controllers\DestinationController::class, 'storeReview'])->name('destinations.reviews.store');
Route::post('/culinary/{slug}/reviews', [App\Http\Controllers\CulinaryController::class, 'storeReview'])->name('culinary.reviews.store');
Route::get('/accommodations', [App\Http\Controllers\AccommodationController::class, 'index'])->name('accommodations.index');
Route::get('/get-me-there', function() { return redirect()->route('accommodations.index'); })->name('transport.index');
Route::post('/accommodations/{slug}/reviews', [App\Http\Controllers\AccommodationController::class, 'storeReview'])->name('accommodations.reviews.store');
Route::get('/accommodations/{slug}', [App\Http\Controllers\AccommodationController::class, 'show'])->name('accommodations.show');