<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\RoomsController;
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

Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::get('/rooms', [RoomsController::class, 'index'])->name('website.rooms');
Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
});

require __DIR__.'/auth.php';
