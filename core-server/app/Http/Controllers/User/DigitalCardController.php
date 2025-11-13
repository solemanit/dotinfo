<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class DigitalCardController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            abort(401, 'User not authenticated');
        }

        $card = $user->card;

        if (!$card) {
            return view('user.dashboard')->with([
                'user' => $user,
                'card' => null,
                'error' => 'No card assigned to this user'
            ]);
        }

        return view('user.dashboard', compact('user', 'card'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'mobile' => 'required|string|max:50',
                'password' => 'nullable|string|min:6',
                'photo' => 'nullable|string',
                'designation' => 'nullable|string|max:255',
                'company' => 'nullable|string|max:255',
                'website' => 'nullable|string|max:255',
                'whatsapp' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:500',
                'facebook' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255',
                'linkedin' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'youtube' => 'nullable|string|max:255',
                'tiktok' => 'nullable|string|max:255',
                'pinterest' => 'nullable|string|max:255',
                'telegram' => 'nullable|string|max:255',
                'snapchat' => 'nullable|string|max:255',
                'github' => 'nullable|string|max:255',
            ]);

            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $card = $user->card;

            if (!$card) {
                return response()->json([
                    'success' => false,
                    'message' => 'No card assigned to this user'
                ], 404);
            }

            // Remove photo from validated data initially
            unset($validated['photo']);

            // Handle base64 photo upload
            if ($request->photo && strpos($request->photo, 'data:image') === 0) {
                try {
                    // Delete old photo if exists
                    if ($user->photo) {
                        Storage::disk('public')->delete($user->photo);
                    }

                    $photoName = 'digital_cards/profile_' . $user->id . '_' . time() . '.jpg';

                    $image = Image::read($request->photo);
                    $image->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $encodedImage = $image->encodeByExtension('jpg', 90);
                    Storage::disk('public')->put($photoName, $encodedImage);

                    $validated['photo'] = $photoName;
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload image: ' . $e->getMessage()
                    ], 500);
                }
            }

            // Update user with digital card data
            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Digital card saved successfully',
                'data' => $user
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the card',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function get()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $card = $user->card;

            if (!$card) {
                return response()->json([
                    'success' => false,
                    'message' => 'No card assigned',
                    'data' => null
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the card',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function publicShow($card_id)
    {
        abort_unless(preg_match('/^[0-9]{4}$/', $card_id), 404);

        $card = Card::where('card_id', $card_id)->firstOrFail();

        if ($card->status == 'inactive') {
            return response()->json([
                'success' => false,
                'status' => 'inactive',
                'message' => 'User registration required.'
            ]);
        }

        $user = $card->user;

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No user found for this card'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
}
