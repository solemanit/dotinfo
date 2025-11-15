<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\UserManagementController;

// ✅ Admin Guest Routes (Login Only)
Route::prefix('admin')->name('admin.')->middleware('guest:admin')->group(function () {
    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AdminAuthenticatedSessionController::class, 'store']);
});

// ✅ Admin Protected Routes
Route::middleware(['auth:admin', 'admin'])
->prefix('admin')
->name('admin.')
->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::post('/users/{id}/toggle-status', [AdminDashboardController::class, 'toggleUserStatus'])
        ->name('users.toggle');
    Route::resource('users', UserManagementController::class);

    // Profile Management
    Route::controller(AdminProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::put('/password', 'updatePassword')->name('password');
        Route::delete('/', 'destroy')->name('destroy');
    });

    // Card Management
    Route::controller(CardController::class)->prefix('cards')->name('cards.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/generate', 'generate')->name('generate');
        Route::get('/{id}/view', 'view')->name('view');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Logout
    Route::post('logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});
