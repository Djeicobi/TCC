<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', EventController::class);
Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('events/update/{id}', [EventController::class, 'update'])->name('events.update');
Route::get('events/show/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('events/list/{id}', [EventController::class, 'index'])->name('events.list');
Route::get('events/page/{id}', [EventController::class, 'page'])->name('events.page');

Route::resource('carts', CartController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
