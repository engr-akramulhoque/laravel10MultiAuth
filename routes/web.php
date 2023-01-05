<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Admin;

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Vendors\VendorController;

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login',[AdminController::class, 'login'])->name('login');
    Route::post('/login/authCheck', [AdminController::class, 'authentication'])->name('adminAuthCheck');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
// Admin Routes


// Vendor Routes
Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/login',[VendorController::class, 'login'])->name('login');
    Route::post('/login/authCheck', [VendorController::class, 'authentication'])->name('vendorAuthCheck');

    Route::middleware('vendor')->group(function () {
        Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout',[VendorController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
// Vendor Routes