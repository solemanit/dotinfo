<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DigitalCardController;
use App\Models\Card;

// Session Debug (Remove in production)
Route::get('/session-dump', function () {
    return response()->json(session()->all());
})->middleware('auth:web,admin');

// Public Routes
Route::view('/', 'welcome')->name('home');
Route::view('/country-restricted', 'errors.country-restricted')->name('country.error');

// Public Digital Card View
Route::get('/view/{card_id}', function ($card_id) {
    abort_unless(preg_match('/^[0-9]{4}$/', $card_id), 404);

    $card = Card::where('card_id', $card_id)->firstOrFail();

    if ($card->status == 'inactive') {
        session(['qr_card_id' => $card_id]);
        return redirect()->route('register')->with('info', 'Please complete registration to activate your card.');
    }

    return view('user.public-view', ['card_id' => $card_id]);
})->name('public.card.view');

// Public API Endpoint
Route::get('/api/card/{card_id}', [DigitalCardController::class, 'publicShow'])
    ->name('public.card.data');

// Email Verification Template Preview (Development Only)
Route::get('/verify-email-template', function () {
    return view('emails.verify-email');
})->name('verify-email.template')->middleware('auth');

// Import Admin & User Routes
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';

// Fallback Route
Route::fallback(function () {
    if (auth()->guard('admin')->check()) {
        return redirect()->route('admin.dashboard')->with('error', 'Page not found.');
    }

    if (auth()->guard('web')->check()) {
        return redirect()->route('user.dashboard')->with('error', 'Page not found.');
    }

    return redirect()->route('home')->with('error', 'Page not found.');
});
