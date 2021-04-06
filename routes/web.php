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

Route::prefix('/fornecedor')->group(function() {
    Route::get('/', function () {
        return view('vendor.index');
    });
    Route::get('/novo', function () {
        return view('vendor.create_edit', ['id' => '']);
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('vendor.create_edit', ['id' => $id]);
    });
});

Route::prefix('/categoria')->group(function() {
    Route::get('/', function () {
        return view('category.index');
    });
    Route::get('/novo', function () {
        return view('category.create_edit', ['id' => '']);
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('category.create_edit', ['id' => $id]);
    });
});

Route::prefix('/produto')->group(function() {
    Route::get('/', function () {
        return view('product.index');
    });
    Route::get('/novo', function () {
        return view('product.create_edit', ['id' => '']);
    });
    Route::get('/editar/{id}', function (int $id) {
        return view('product.create_edit', ['id' => $id]);
    });
    Route::get('/adicionar-produtos', function () {
        return view('product.add_sub');
    });
    Route::get('/baixar-produtos', function () {
        return view('product.add_sub');
    });
});