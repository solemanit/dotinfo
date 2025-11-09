<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DigitalCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
                'digitalCard' => null,
                'card' => null,
                'error' => 'No card assigned to this user'
            ]);
        }

        $digitalCard = $user->digitalCards()->where('card_id', $card->id)->first();

        return view('user.dashboard', compact('digitalCard', 'card'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'nullable|string|max:255',
                'photo' => 'nullable|string',
                'website' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:50',
                'email' => 'nullable|email|max:255',
                'whatsapp' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:500',
                'facebook' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255',
                'linkedin' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'youtube' => 'nullable|string|max:255',
                'tiktok' => 'nullable|string|max:255',
                'pinterest' => 'nullable|string|max:255',
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

            // Handle base64 photo upload
            if ($request->photo && strpos($request->photo, 'data:image') === 0) {
                try {
                    // Delete old photo if exists
                    $existingCard = $user->digitalCards()->where('card_id', $card->id)->first();
                    if ($existingCard && $existingCard->photo) {
                        Storage::disk('public')->delete($existingCard->photo);
                        Log::info('Old photo deleted: ' . $existingCard->photo);
                    }

                    // Generate unique filename
                    $photoName = 'digital_cards/profile_' . $user->id . '_' . time() . '.jpg';

                    // Process image using Intervention Image
                    $image = Image::read($request->photo);

                    // Resize to 300x300
                    $image->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    // Encode to JPEG with 90% quality
                    $encodedImage = $image->encodeByExtension('jpg', 90);

                    // Save to storage/app/public/digital_cards/
                    Storage::disk('public')->put($photoName, $encodedImage);

                    // Store path in database (without 'storage/' prefix)
                    $validated['photo'] = $photoName;

                    Log::info('Image saved successfully: storage/app/public/' . $photoName);

                } catch (\Exception $e) {
                    Log::error('Image Upload Error: ' . $e->getMessage());
                    Log::error('Stack trace: ' . $e->getTraceAsString());

                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload image: ' . $e->getMessage()
                    ], 500);
                }
            }

            $validated['user_id'] = $user->id;
            $validated['card_id'] = $card->id;

            $digitalCard = DigitalCard::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'card_id' => $card->id
                ],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Digital card saved successfully',
                'data' => $digitalCard
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Digital Card Save Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

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

            $digitalCard = $user->digitalCards()->where('card_id', $card->id)->first();

            return response()->json([
                'success' => true,
                'data' => $digitalCard
            ]);

        } catch (\Exception $e) {
            Log::error('Digital Card Get Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the card',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
