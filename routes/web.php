<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/', [InicioController::class, 'index'])->name('inicio');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
    Route::post('/carrito', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::patch('/carrito/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
});

Route::resource('categorias', CategoriaController::class)->except(['create', 'edit']);
Route::resource('productos', ProductoController::class)->except(['create', 'edit']);

Route::get('/about', [AboutController::class, 'index'])->name('about');