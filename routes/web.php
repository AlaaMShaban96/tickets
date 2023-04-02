<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
// Route::get('/test', function (Request $request) {

// // dd();


//             dd($days->unique('id'),$x);
// });
// login route
Route::get('/login',[App\Http\Controllers\AuthController::class,'loginView'])->name('login_view');
Route::post('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');



Route::get('/', [App\Http\Controllers\DashboardController::class,'index'])->name("trips.search");
Route::post('/get-available-days', [App\Http\Controllers\DashboardController::class,'getDates'])->name("trips.get_available_days");
Route::get('/booking/{trip}', [App\Http\Controllers\TripController::class,'booking'])->name("trips.booking");
Route::post('/tickets', [App\Http\Controllers\TicketController::class,'store'])->name("tickets.store");

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');

    Route::get('/passengers/{ticket}/list', [App\Http\Controllers\PassengerController::class,'list'])->name("passengers.list");
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dashboard'])->name("dashboard.index");
    Route::get('/tickets/{ticket}/chenge_status', [App\Http\Controllers\TicketController::class,'chengeStatus'])->name("tickets.chenge_status");

    // Route::resource('tickets', App\Http\Controllers\TicketController::class);

    Route::resource('countries', App\Http\Controllers\CountryController::class);

    Route::resource('airports', App\Http\Controllers\AirportController::class);

    Route::resource('days', App\Http\Controllers\DayController::class);

    Route::resource('seat-types', App\Http\Controllers\SeatTypeController::class);

    Route::resource('airlines', App\Http\Controllers\AirlineController::class);

    Route::resource('planes', App\Http\Controllers\PlaneController::class);

    // Route::resource('passengers', App\Http\Controllers\PassengerController::class);

    Route::resource('trips', App\Http\Controllers\TripController::class);
});




