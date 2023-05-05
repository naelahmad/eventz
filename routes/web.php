<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\admin\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'userType'])->name('dashboard');

require __DIR__ . '/auth.php';

/* not access dashboard if not admin*/

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'userType'],
], function () {
    Route::resource('types', TypesController::class);
    Route::resource('faqs', FaqsController::class);

    Route::get('events/trashed', [EventsController::class, 'gettrashed']);
    Route::get('events/restore/{id}', [EventsController::class, 'restore'])->name('events.restore');
    Route::get('events/restore-all', [EventsController::class, 'restoreAll'])->name('events.restoreAll');
    Route::delete('events/focedelete/{id}', [EventsController::class, 'forcedelete'])->name('events.forcedelete');


    Route::resource('events', EventsController::class);
    Route::resource('contacts', ContactsController::class);

    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');
});
