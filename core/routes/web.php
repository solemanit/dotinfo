<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\User\DigitalCardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfileController;
use App\Models\Card;


Route::get('/session-dump', function () {
    return response()->json(session()->all());
});

Route::view('/', 'welcome')->name('home');
Route::view('/country-restricted', 'errors.country-restricted')->name('country.error');

// Redirect based on role after login
Route::middleware('auth', 'verified')->get('/dashboard', function () {
    return auth()->user()->isAdmin()
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard & Users
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
        Route::post('/users/{id}/toggle-status', [AdminDashboardController::class, 'toggleUserStatus'])->name('users.toggle');

        // Profile
        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
        });

        // Cards
        Route::controller(CardController::class)->prefix('cards')->name('cards.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/generate', 'generate')->name('generate');
            Route::get('/{id}/view', 'view')->name('view');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::resource('users', UserManagementController::class);
    });

// User Routes
Route::middleware(['auth', 'user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        //Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::controller(UserProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::put('/password', 'updatePassword')->name('password');
            Route::delete('/', 'destroy')->name('destroy');
        });

        // Digital Card
        Route::get('/dashboard', [DigitalCardController::class, 'show'])
            ->name('dashboard');

        Route::post('/digital-card/store', [DigitalCardController::class, 'store'])
            ->name('digital-card.store');

        Route::get('/digital-card/get', [DigitalCardController::class, 'get'])
            ->name('digital-card.get');
    });

Route::fallback(fn() => redirect()->route('login')->with('error', 'Page not found or access denied.'));

Route::get('/view/{card_id}', function ($card_id) {
    abort_unless(preg_match('/^[0-9]{4}$/', $card_id), 404);

    $card = Card::where('card_id', $card_id)->firstOrFail();

    // If card inactive → redirect to register with session
    if ($card->status == 'inactive') {
        session(['qr_card_id' => $card_id]);
        return redirect()->route('register')->with('info', 'Please complete registration.');
    }

    // If card active → Show user's public data
    if ($card->status == 'active' && $card->user) {
        return view('user-view', ['user' => $card->user]);
    }

    abort(404);
});

require __DIR__ . '/auth.php';
