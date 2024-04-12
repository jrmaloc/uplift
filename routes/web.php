<?php

use App\Http\Controllers\AccountCommentsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountPageController;
use App\Http\Controllers\AccountPostsController;
use App\Http\Controllers\AccountUsersController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserPageController;
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
    return redirect()->route('auth.login');
});

Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::match(['GET', 'POST'], 'logout', [AuthenticateController::class, 'logout'])->name('auth.logout');

});


// guest routes
Route::post('login', [AuthenticateController::class, 'login'])->name('auth.login');
Route::post('register', [AuthenticateController::class, 'register'])->name('auth.register');

// logged in routes
Route::middleware(['auth:sanctum', 'verified', 'revalidate', config('jetstream.auth_session')])
    ->group(function () {
        Route::resource('profile', ProfileController::class);
        Route::match(['PUT', 'PATCH'], 'profile/{profile}/change', [ProfileController::class, 'change_password'])->name('profile.change_password');
        Route::post('profile/{profile}/check', [ProfileController::class, 'check_password'])->name('profile.check_password');
    });

// dashboard routes
Route::middleware(['auth:sanctum', 'verified', 'revalidate', 'role:admin|super-admin', config('jetstream.auth_session')])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::resource('home', DashboardController::class);
        Route::resource('posts', DashboardPostsController::class);
        Route::resource('users', DashboardUserController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

    });

// account routes
Route::middleware(['auth:sanctum', 'verified', 'revalidate', 'role:admin|super-admin', config('jetstream.auth_session')])
    ->prefix('account')
    ->name('account.')
    ->group(function () {
        Route::resource('home', AccountController::class);
        Route::resource('posts', AccountPostsController::class);
        Route::resource('users', AccountUsersController::class);
        Route::resource('comments', AccountCommentsController::class);
    });
