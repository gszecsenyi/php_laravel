<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ApartmentHouseController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guests', GuestController::class);
Route::resource('apartment-houses', ApartmentHouseController::class);
Route::resource('bookings', BookingController::class);
