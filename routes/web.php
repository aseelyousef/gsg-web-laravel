<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shorturlcontroller;

use App\Http\Controllers\ShortLinkController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/short', [ShortLinkController::class, 'short'])->name('short.url');
Route::get('/{code}',[ShortLinkController::class, 'show'])->name('short.show');










//Route::get('{code}', 'shorturlcontroller@shorturl')->name('shorturl');
