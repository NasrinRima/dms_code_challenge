<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;





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
Route::get('/quick-search', [PagesController::class,'quickSearch'])->name('quick-search');
Route::post('/forgot-password',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::post('/reset-password',[ResetPasswordController::class,'reset'])->name('password.update');
    Route::get('/', [DashboardController::class,'index']);

    Route::group(['prefix' => 'user','middleware' => ['resource.maker','auth.acl']], function () {
        Route::get('/my-profile', [UsersController::class,'myProfile']);
        Route::get('/edit-profile', [UsersController::class,'editProfile']);
        Route::post('/update-profile', [UsersController::class,'updateProfile']);
        Route::get('/change-password', [UsersController::class,'changePassword']);
        Route::post('/save-new-password', [UsersController::class,'updatePassword']);
        Route::resource('/user', UsersController::class);
        Route::get('/dashboard', [DashboardController::class,'index']);
        Route::get('/logout',[UsersController::class,'logout']);
        Route::resource('/books', BookController::class);
        Route::get('/add-to-cart',[CartController::class,'addToShoppingCart']);
        Route::resource('/my-cart', CartController::class);

        // Route::resource('/faq', FaqController::class);

    });
