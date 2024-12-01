<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/produto', [ProductController::class, 'index'])->name('produto');

    Route::get('admin/produto/{id}/edit', [ProductController::class, 'edit'])->name('produto.edit');

    Route::put('admin/produto/{id}', [ProductController::class, 'update'])->name('produto.update');

    Route::delete('admin/produto/{id}', [ProductController::class, 'destroy'])->name('produto.destroy');

    Route::get('/create', [AppController::class, 'create']);

    Route::post('/produtos', [ProductController::class, 'store']);

    Route::get('/produto', [ProductController::class, 'index'])->name('produto');

});


Route::middleware(['auth', 'comprador'])->group(function () {
    Route::get('/comprador', [AppController::class,'comprador'])->name('comprador.dashboard');

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');

    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

    Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::post('/cart/confirm', [CartController::class, 'confirmOrder'])->name('cart.confirmOrder');

    Route::get('/order_history', [CartController::class, 'history'])->name('orders.history');
});


Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class,'user'])->name('user');
    Route::get('/usuario', [UserController::class, 'edit'])->name('usuario.edit'); // Página de edição
    Route::put('/usuario', [UserController::class, 'update'])->name('usuario.update'); // Atualizar usuário
    Route::delete('/usuario', [UserController::class, 'destroy'])->name('usuario.destroy'); // Excluir usuário
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('logar');


Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/cadastrar', [AuthController::class, 'showCadastro'])->name('cadastrar');


Route::post('/cadastrar', [AuthController::class, 'cadastrar'])->name('cadastrar.post');


Route::get('/', [AppController::class, 'index']);

Route::get('/produtos/carregar', [ProductController::class, 'fetchAndSave'])->name('produtos.carregar');

Route::get('/prod', [ProductController::class, 'indice'])->name('produtos.index');
