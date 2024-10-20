<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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
//Eventos
Route::resource('events', EventController::class);
Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('events/update/{id}', [EventController::class, 'update'])->name('events.update');
Route::get('events/show/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('events/list', [EventController::class, 'index'])->name('events.list');
Route::get('all', [EventController::class, 'all'])->name('events.all');
Route::get('events/page/{id}', [EventController::class, 'page'])->name('events.page');
Route::get('events/add/{id}', [EventController::class, 'add'])->name('events.add');
Route::post('photo/events/{id}', [EventController::class, 'photo_store'])->name('events.photo');
Route::post('photo/album/{id}', [EventController::class, 'listarImagens'])->name('events.listarImagens');


//Fotos
Route::resource('photos', PhotoController::class);



//Carrinho
Route::resource('carts', CartController::class);
Route::post('cart/add/{photo}/{event}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart/', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/delete/{photo}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

//Order
Route::resource('orders', OrderController::class);
Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('order/success/{order}', [OrderController::class, 'success'])->name('order.success');
Route::post('order/cancel/{order}', [OrderController::class, 'cancelOrder'])->name('order.cancel');
Route::delete('order/delete/{order}', [OrderController::class, 'destroy'])->name('order.destroy');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
