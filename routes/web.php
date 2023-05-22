<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
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
Route::get('/', [HomeController::class, 'index'] );
Route::resource('home', HomeController::class );

Route::get('auth/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function(){
    Route::get('auth/login', [AuthController::class, 'viewLogin'] );
    Route::get('auth/register', [AuthController::class, 'viewRegister'] );
    Route::post('auth/login', [AuthController::class, 'login'] );
    Route::post('auth/register', [AuthController::class, 'register'] );
});


Route::prefix('customer')->middleware(['role:customer'], 'auth')->group(function () {
    Route::get('', [HomeController::class, 'index'] );
    Route::get('offering', [CustomerController::class, 'viewOffering'] );
    Route::get('setOffer/{house}', [CustomerController::class, 'setOffer'] );
    Route::get('house', [CustomerController::class, 'viewHouse'] );
    Route::get('rent-out/{owner}', [CustomerController::class, 'rentOut'] );
    Route::get('cancel-rent/{owner}', [CustomerController::class, 'cancelRent'] );
});

Route::prefix('admin')->middleware(['role:admin'], 'auth')->group(function () {
    Route::get('', [AdminController::class, 'viewCustomers'] );
    Route::get('customers', [AdminController::class, 'viewCustomers'] );
    Route::get('offers', [AdminController::class, 'viewOffers'] );
    Route::get('accept-offer/{offer}', [AdminController::class, 'verifyOffer'] );
    Route::get('deny-offer/{offer}', [AdminController::class, 'denyOffer'] );

    Route::get('finish-order/{order}', [AdminController::class, 'finishOrder'] );
    Route::get('complaints', [AdminController::class, 'viewComplaints'] );
    Route::get('finish-complaint/{complaint}', [AdminController::class, 'finishComplaint'] );

    Route::resource('houses', HouseController::class);
});