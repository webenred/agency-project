<?php

use App\Http\Controllers\ProfileController;
use App\Models\Agency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $agence = Agency::find(1);
    return view('welcome', ['agence' => $agence]);
})->name('welcome');

Route::get('/test', function(){});
Route::get('/trips', function() {})->name('trips');
Route::get('/hotels', function() {})->name('hotels');
Route::get('/ticketing', function() {})->name('ticketing');
Route::get('/contact', function() {})->name('contact');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
