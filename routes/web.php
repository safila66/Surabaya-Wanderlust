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
Route::get('/culture/heritage', function() { return view('culture.heritage'); })->name('culture.heritage');
Route::get('/culture/traditions', function() { return view('culture.traditions'); })->name('culture.traditions');
Route::get('/culture/arts', function() { return view('culture.arts'); })->name('culture.arts');

// Travel Guide Sub-pages
Route::get('/travel-guide/getting-around', function() { return view('travel-guide.getting-around'); })->name('travel-guide.getting-around');
Route::get('/travel-guide/before-you-go', function() { return view('travel-guide.before-you-go'); })->name('travel-guide.before-you-go');
Route::get('/travel-guide/tips', function() { return view('travel-guide.tips'); })->name('travel-guide.tips');

// Plan Your Trip Sub-pages
Route::get('/plan-your-trip/nature-escape', function() { return view('plan-your-trip.nature'); })->name('plan-your-trip.nature');
Route::get('/plan-your-trip/culture-heritage', function() { return view('plan-your-trip.culture'); })->name('plan-your-trip.culture');
Route::get('/plan-your-trip/culinary-journey', function() { return view('plan-your-trip.culinary'); })->name('plan-your-trip.culinary');
