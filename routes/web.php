<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/exhibition', [PageController::class, 'exhibition'])->name('page.exhibition');
Route::get('/my-page', [PageController::class, 'my_page'])->name('page.personal');

Route::get('/login', [PageController::class, 'login'])->name('page.login');
Route::get('/register', [PageController::class, 'register'])->name('page.register');


Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
