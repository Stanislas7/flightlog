<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
    Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
    Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])->name('flights.edit');
    Route::put('/flights/{flight}', [FlightController::class, 'update'])->name('flights.update');
    Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])->name('flights.destroy');
});

require __DIR__.'/auth.php';
