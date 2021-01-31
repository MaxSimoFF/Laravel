<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;

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

// Route::get('/employee', [EmployeeController::class, 'index']);
// Route::view('/employee/create', 'employee.create');
// Route::post('/employee', [EmployeeController::class, 'store']);
// Route::get('/employee/{employee}', [EmployeeController::class, 'destroy']);
Route::resource('employee', EmployeeController::class);

Route::get('/session/get', [SessionController::class, 'getSession']);
Route::get('/session/store', [SessionController::class, 'storeSession']);
Route::get('/session/delete', [SessionController::class, 'deleteSession']);
Route::get('/sendmail', [MailController::class, 'sendMail']);

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

/*
| Authentication with facebook ( Login with facebook ).
*/
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::resource('player', PlayersController::class);

