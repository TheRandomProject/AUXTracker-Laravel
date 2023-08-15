<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/time-stamp', function() {
    return Inertia::render('TimeStamp/index');
})->name('timestamp');

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('timestamp');

Route::middleware('auth')->group(function () {

    Route::get('/egants', function() {
        return Inertia::render('Egant/index');
    })->name('egants');

    Route::get('/auxs', function() {
        return Inertia::render('aux/index');
    })->name('auxs');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
