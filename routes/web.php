<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\CheckKitchen;
use App\Http\Middleware\CheckManager;
use Illuminate\Support\Facades\Route;

use App\Models\Cities;
use App\Models\Hotels;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [HotelsController::Class, 'showHomePage'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/cities/{city}/hotels', [CitiesController::class, 'showHotels'])->name('cities.hotels');

Route::get('/hotels/{hotel}', [HotelsController::class, 'index'])->name('hotels');;

Route::get('hotels/{hotel}/{room}', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/search', [RoomController::class, 'search'])->name('advancedSearch');

Route::get('/setting/{id}', [UserController::class, 'setting'])->name('setting');

Route::post('/setting/update', [UserController::class, 'update'])->name('update');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');


Route::post('/contact-us',[CitiesController::class, 'contactEmail']);
//this route is necessary to display logged in user name on error pages
//another solution is to add theses lines:
// \Illuminate\Session\Middleware\StartSession::class,
// \Illuminate\View\Middleware\ShareErrorsFromSession::class,
//to app\Http\Kernel  in the $middleware array
Route::fallback(function(){
    return view('errors.404');
});

Route::middleware('auth')->group(function() {




    Route::get('/bookings/create/{room}', [BookingController::class, 'create'])->name('bookings.create');

    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');



});

Route::middleware(['auth', CheckKitchen::class])->group(function() {
    Route::get('/kitchen', [OrderController::class, 'getKitchenPage']);
    Route::post('/order-completed', [OrderController::class, 'orderCompleted']);
});
require __DIR__ . '/auth.php';
