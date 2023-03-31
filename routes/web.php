<?php

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\DashboardController::class,'index'])->name("trips.search");

Route::resource('countries', App\Http\Controllers\CountryController::class);

Route::resource('airports', App\Http\Controllers\AirportController::class);

Route::resource('days', App\Http\Controllers\DayController::class);

Route::resource('seat-types', App\Http\Controllers\SeatTypeController::class);

Route::resource('airlines', App\Http\Controllers\AirlineController::class);

Route::resource('planes', App\Http\Controllers\PlaneController::class);

Route::resource('passengers', App\Http\Controllers\PassengerController::class);

Route::resource('tickets', App\Http\Controllers\TicketController::class);
Route::get('/booking/{trip}', [App\Http\Controllers\TripController::class,'booking'])->name("trips.booking");

Route::resource('trips', App\Http\Controllers\TripController::class);

