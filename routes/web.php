<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ConductorCodeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('conductores', DriverController::class);
    Route::get('/driver/{id}/edit', [DriverController::class, 'edit'])->name('driver.edit');
    Route::put('/driver/{id}', [DriverController::class, 'update'])->name('driver.update');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::resource('pasajeros', PassengerController::class);
    Route::delete('/pasajeros/{solipasaje}', [PassengerController::class, 'destroy'])->name('pasajeros.destroy');
});

Route::get('/conductor/code', [ConductorCodeController::class, 'create'])->name('conductor.code');
Route::post('/conductor/code', [ConductorCodeController::class, 'store'])->name('conductor.code.verify');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
