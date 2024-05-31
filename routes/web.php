<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingsController;
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

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('website.home');
    Route::get('/search', [HomeController::class, 'search'])->name('website.search');
    Route::get('/rooms', [RoomsController::class, 'index'])->name('website.rooms');
    Route::get('/rooms/{room:id}', [RoomsController::class, 'show'])->name('website.rooms.show');
    Route::post('/rooms/{room:id}/book', [RoomsController::class, 'book'])->name('website.rooms.book');
    Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');
});

Route::prefix('admin')->middleware(['auth', 'permission:access dashboard'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('users', UsersController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('roles', RolesController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('permissions', PermissionsController::class)->only(['index']);
    });

    Route::middleware(['role:employee|super-admin'])->group(function () {
        Route::resource('rooms', AdminRoomsController::class)->except(['show']);
        Route::delete('rooms/{room:id}/images/{mediaItem:id}', [AdminRoomsController::class, 'deleteImage'])->name('rooms.deleteImage');

        Route::controller(BookingsController::class)->group(function () {
            Route::get('/bookings', 'index')->name('bookings.index');
            Route::get('/bookings/accept/{id}', 'accept')->name('bookings.accept');
            Route::get('/bookings/reject/{id}', 'reject')->name('bookings.reject');
        });
    });
});

require __DIR__.'/auth.php';
