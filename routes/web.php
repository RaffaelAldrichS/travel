<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('destinations', DestinationController::class);
    Route::resource('hotels', HotelController::class)->names('hotels');
    Route::resource('transports', TransportController::class)->names('transports');
    Route::resource('packets', PacketController::class)->names('packets');

    Route::get('/dashboard', function () {
        return view('Pages.Dashboard.index');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
