<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('statistics')->group(function () {

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
        'confirm' => false,
    ]);

    Route::get('/statistics/{college}', [HomeController::class, 'statistics'])->name('statistics');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


});

