<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UsersController;

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

Route::get('/login',[LoginController::class,'showLoginForm']);
Route::post('/login',[LoginController::class,'login']);
//Route::get('/admin/dashboard', 'DashboardController::class');
//Route::resource('/admin/dashboard', DashboardController::class);
Route::group(['prefix' => 'admin','middleware' => ['resource.maker','auth.acl']], function () {
//    Route::resource('/dashboard', DashboardController::class);
    Route::get('/dashboard', [DashboardController::class,'index']);
//    Route::resource('/dashboard', DashboardController::class);
    Route::get('/logout',[UsersController::class,'logout']);
});


//Route::get('/', function () {
//    return view('welcome');
//});
//Route::group(['prefix'=>'admin','middleware' => ['resource.maker','auth.acl']], function () {
//    Route::resource('/dashboard', 'Auth\UsersController');
//    Route::get('/home', 'HomeController@index');
//    Route::get('/dashboard', 'Auth\UsersController@index');
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'PagesController@index');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
