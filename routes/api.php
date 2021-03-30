<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentMediaController;
use App\Http\Controllers\NewsletterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('page/save', [PageController::class, 'store_my_page'])->name('my_page.save');
Route::post('media/save', [StudentMediaController::class, 'save'])->name('media.save');
Route::get('media/get/{id}', [StudentMediaController::class, 'get'])->name('media.get');
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
