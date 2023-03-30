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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/serach', [App\Http\Controllers\DashboardController::class,'index'])->name("tickets.search");

Route::resource('country', App\Http\Controllers\CountryController::class);

Route::resource('airport', App\Http\Controllers\AirportController::class);

Route::resource('day', App\Http\Controllers\DayController::class);

Route::resource('seat-type', App\Http\Controllers\SeatTypeController::class);

Route::resource('airline', App\Http\Controllers\AirlineController::class);

Route::resource('plane', App\Http\Controllers\PlaneController::class);

Route::resource('passenger', App\Http\Controllers\PassengerController::class);

Route::resource('ticket', App\Http\Controllers\TicketController::class);

Route::resource('trip', App\Http\Controllers\TripController::class);

