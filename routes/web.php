<?php

use App\Http\Controllers\Auth\Authenticate;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthenticateController::class, 'login'])->name('auth.login');
Route::post('register', [AuthenticateController::class, 'register'])->name('auth.register');
Route::match(['PUT', 'PATCH'], '/dashboard/users/{user}/password', [UserController::class, 'password'])->name('users.password');
Route::post('/dashboard/users/{user}/checkpassword', [UserController::class, 'check'])->name('users.checkpassword');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'revalidate',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::match(['GET', 'POST'], 'logout', [AuthenticateController::class, 'logout'])->name('auth.logout');
    Route::resource('/dashboard/users', UserController::class);
});

