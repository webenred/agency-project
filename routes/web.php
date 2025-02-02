<?php

use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\ProfileController;
use App\Models\Agency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $agence = Storage::json('private/Agency.json');
    return view('welcome', ['agence' => $agence]);
})->name('welcome');


Route::get('/users', function () {
    return User::paginate(5);
});


Route::get('/trips', function () {
})->name('trips');

Route::get('/hotels', function () {
    $agence = Storage::json('private/Agency.json');
    $hotels = Hotel::all();

    return view('hotels', [
        'agence' => $agence,
        'hotels' => $hotels
    ]);
})->name('hotels');

Route::get('/hotels/{slug}', function ($slug) {
    dd(Hotel::where('slug', $slug)->first());
})->name('hotel');

Route::get('/ticketing', function () {
})->name('ticketing');

Route::get('/contact', function () {
})->name('contact');




/**
 * ADMIN ROUTES => prefix => /admin
 *  
 *  /dashboard => all data about app and client
 *  
 *  [get] /hotels => all hotels
 *  [get] /hotels/create => view to create new hotel
 *  [post] /hotels => store new hotel
 *  [get] /hotels/{id} => show hotel
 *  [get] /hotels/{id}/update => view to update hotel
 *  [patch] /hotels/{id} => edit hotel
 *  [delete] /hotels/{id} => delete hotel
 *  
 *  [get] /trips => all trips
 *  [get] /trips/create => view to create new trip
 *  [post] /trips => store new trip
 *  [get] /trips/{id} => show trip
 *  [get] /trips/{id}/update => view to update trip
 *  [patch] /trips/{id} => edit trip
 *  [delete] /trips/{id} => delete trip
 * 
 * 
 */
Route::middleware('auth', 'verified')->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::controller(HotelController::class)->group(function () {
        Route::get('/hotels', 'index')->name('admin.hotels');
        Route::get('/hotels/create', 'create')->name('admin.hotel.create');
        Route::post('/hotels/create', 'store')->name('admin.hotel.store');
        Route::get('/hotels/edit/{id}', 'edit')->name('admin.hotel.edit');
        Route::post('/hotels/edit/{id}', 'update')->name('admin.hotel.update');
        Route::get('/hotels/{id}', 'show')->name('admin.hotel.show');


        Route::delete('/hotels/{id}', 'delete')->name('admin.hotel.delete');
    });


    Route::get('/trips')->name('admin.trips');
});




Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
