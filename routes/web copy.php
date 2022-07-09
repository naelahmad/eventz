<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ContactsController;


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

Route::resource('types', TypesController::class);
Route::resource('faqs', FaqsController::class);
Route::resource('events', EventsController::class);
Route::resource('contacts', ContactsController::class);
