<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\User\DashboardController as UserDashboard;
// use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

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
    return view('index');
})->name('welcome');

// Route::get('login', function () {
//     return view('auth.user.login');
// })->name('login');

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware('auth')->group(function (){
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    //dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
    // //user dashboard
    // Route::prefix('user/dashboard')->namespace('User')->name('user')->group(function(){
    //     Route::get('/', [UserDashboard::class, 'index'])->name('user.dashboard'); //called by route ('user.dashboard')
    // });
    // //admin dashboard
    // Route::prefix('admin/dashboard')->namespace('Admin')->name('admin')->group(function(){
    //     Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard'); //called by route ('admin.dashboard')
    // });
});

require __DIR__.'/auth.php';