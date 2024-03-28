<?php

use App\Http\Controllers\AccountPageController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;





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

Route::post('login', [AuthenticateController::class, 'login'])->name('auth.login');
Route::post('register', [AuthenticateController::class, 'register'])->name('auth.register');
Route::match(['PUT', 'PATCH'], '/dashboard/users/{user}/password', [UserController::class, 'password'])->name('users.password');
Route::post('/dashboard/users/{user}/checkpassword', [UserController::class, 'check'])->name('users.checkpassword');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'revalidate', 'role:admin|super-admin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/posts', PostController::class);
    Route::resource('/dashboard/roles', RolesController::class);
    Route::resource('/dashboard/profile', ProfileController::class);
    Route::resource('/dashboard/permissions', PermissionsController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'revalidate',
])->group(function () {
    Route::resource('/account/user_page', UserPageController::class);
    Route::resource('/account/posts_page', PostPageController::class);
    Route::resource('/account/profile', ProfileController::class);
    Route::resource('account/home', AccountPageController::class);
    Route::resource('/account/comments', CommentController::class);
});

