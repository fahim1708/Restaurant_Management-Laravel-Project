<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\SpecialDishController;
use App\Http\Controllers\TestimonialController;

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

/* home */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

/* Admin */
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.index');
});

/* User */
// Route::resource('user', UserController::class)->only([
//     'index','destroy'
// ]);
/* User Profile and Password */
Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::put('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');  // <-- This route is important
    Route::put('/user/password', [UserController::class, 'updatePassword'])->name('user.password.update');
});
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');


/* Reservation */
Route::resource('reservation', ReservationController::class)->only([
    'index','store'
]);

/* Food Menu */
Route::resource('foodmenu', FoodMenuController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

/* Special Dish */
// Route::resource('specialdishes', SpecialDishController::class)->only([
//     'index', 'create', 'store', 'edit', 'update', 'destroy'
// ]);
Route::resource('specialdishes', SpecialDishController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);


/* Testimonial */
Route::resource('testimonial', TestimonialController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

/* jetstream auth */
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('user.index');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

