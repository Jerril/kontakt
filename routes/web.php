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
    Route::post('/group', [DashboardController::class, 'storeGroup'])->name('group.post');
    Route::delete('/group/{group}', [DashboardController::class, 'deleteGroup'])->name('group.delete');

    // contact routes
    Route::post('/contact', [DashboardController::class, 'storeContact'])->name('contact.post');
    Route::put('/contact/{contact}', [DashboardController::class, 'updateContact'])->name('contact.put');
    Route::get('/contact/{contact}', [DashboardController::class, 'deleteContact'])->name('contact.delete');

    // assign contact to a group
    Route::put('/contact/{contact}/group/{group}', [DashboardController::class, 'groupContact'])->name('contact.group-contact');
});
