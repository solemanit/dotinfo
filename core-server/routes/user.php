<?php

use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredForeignUserController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\ResendOrUpdateEmailController;
use App\Http\Controllers\User\Auth\UserAuthenticatedSessionController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use App\Http\Controllers\User\DigitalCardController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ✅ Guest Routes (Registration & Login)
Route::middleware('guest:web')->group(function () {

Route::middleware('check.country')->group(function () {
    // Dynamic Registration (BD vs Foreign)
    Route::get('register', function () {
        return session('is_bd_user')
            ? app(RegisteredUserController::class)->create()
            : app(RegisteredForeignUserController::class)->create();
    })->name('register');

    Route::post('register', function (Request $request) {
        return session('is_bd_user')
            ? app(RegisteredUserController::class)->store($request)
            : app(RegisteredForeignUserController::class)->store($request);
    });

    // OTP Verification (BD Users Only)
    Route::post('/verify-otp', function (Request $request) {
        if (!session('is_bd_user')) abort(404);
        return app(RegisteredUserController::class)->verifyOtp($request);
    })->name('otp.verify');

    Route::post('/resend-otp', function (Request $request) {
        if (!session('is_bd_user')) abort(404);
        return app(RegisteredUserController::class)->resendOtp($request);
    })->name('otp.resend');

    // User Login
    Route::get('login', [UserAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [UserAuthenticatedSessionController::class, 'store']);
});

// Password Reset
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');
});

// ✅ Authenticated User Routes
Route::middleware('auth:web')->group(function () {

// Email Verification
Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');
Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
Route::post('/email/resend-or-update', ResendOrUpdateEmailController::class)
    ->name('verification.resend-or-update');

// Password Confirmation
Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->name('password.confirm');
Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

// Update Password
Route::put('password', [PasswordController::class, 'update'])->name('password.update');

// Logout
Route::post('logout', [UserAuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

// ✅ Protected User Dashboard Routes
Route::middleware(['auth:web', 'user'])
->prefix('user')
->name('user.')
->group(function () {

    // Profile Management
    Route::controller(UserProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::put('/password', 'updatePassword')->name('password');
        Route::delete('/', 'destroy')->name('destroy');
    });

    // Digital Card
    Route::get('/dashboard', [DigitalCardController::class, 'show'])->name('dashboard');
    Route::post('/digital-card/store', [DigitalCardController::class, 'store'])
        ->name('digital-card.store');
    Route::get('/digital-card/get', [DigitalCardController::class, 'get'])
        ->name('digital-card.get');

    // Security Settings
    Route::post('/security/update', [DigitalCardController::class, 'updateSecurity'])
        ->name('security.update');
});
