<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
    return view('pages.index');
});

Route::get('/login', [AuthController::class, 'login_form'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signup_form'])->name('signup.get');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // contact group routes
    Route::name('group')->group(function() {
        Route::post('/', [DashboardController::class, 'storeGroup'])->name('group.post');
        Route::delete('/{group}', [DashboardController::class, 'deleteGroup'])->name('group.delete');
    });

    // contact routes
    Route::name('contact')->group(function() {
        Route::post('/', [DashboardController::class, 'storeContact'])->name('.post');
        Route::put('/{contact}', [DashboardController::class, 'updateContact'])->name('.put');
        Route::get('/{contact}', [DashboardController::class, 'deleteContact'])->name('.delete');

        // assign contact to a group
        Route::put('/{contact}/group/{group}', [DashboardController::class, 'groupContact'])->name('group-contact');
    });
});
