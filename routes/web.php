<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/fornecedores')->group(function() {
    Route::get('/', function () {
        return view('vendor.index');
    });
    Route::get('/novo', function () {
        return view('vendor.create');
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('vendor.edit', ['id' => $id]);
    });
});

Route::prefix('/categorias')->group(function() {
    Route::get('/', function () {
        return view('category.index');
    });
    Route::get('/novo', function () {
        return view('category.create');
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('category.edit', ['id' => $id]);
    });
});

Route::prefix('/produtos')->group(function() {
    Route::get('/', function () {
        return view('product.index');
    });
    Route::get('/novo', function () {
        return view('product.create');
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('product.edit', ['id' => $id]);
    });
    Route::get('/adicionar-produtos', function () {
        return view('product.add');
    });
    Route::get('/baixar-produtos', function () {
        return view('product.sub');
    });
});