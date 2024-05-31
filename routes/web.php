<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RoomsController as AdminRoomsController;
use App\Http\Controllers\Admin\UsersController;
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

Route::prefix('admin')->middleware(['auth', 'permission:access dashboard'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('permissions', PermissionsController::class);
    });
    Route::middleware(['role:employee|super-admin'])->group(function () {
        Route::resource('rooms', AdminRoomsController::class);
    });
});

require __DIR__.'/auth.php';
