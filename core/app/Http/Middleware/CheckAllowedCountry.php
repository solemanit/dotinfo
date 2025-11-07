<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class CheckAllowedCountry
{
    private array $allowedCountries = [
        'BD', // Bangladesh
        'US', // United States
        'GB', // United Kingdom
        'CA', // Canada
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        // -------------------------------
        // 1️⃣ Local development override
        // -------------------------------
        if (app()->environment('local')) {
            $overrideCountry = env('TEST_COUNTRY'); // .env এ সেট করুন, যেমন TEST_COUNTRY=BD

            if ($overrideCountry && in_array($overrideCountry, $this->allowedCountries)) {
                session([
                    'user_country_code' => $overrideCountry,
                    'user_country_name' => $this->getCountryName($overrideCountry),
                    'is_bd_user' => $overrideCountry === 'BD',
                ]);

                Log::info("Local override country set to {$overrideCountry}");
                return $next($request);
            }
        }

        // -------------------------------
        // 2️⃣ Production/live logic
        // -------------------------------
        try {
            $location = Location::get($ip);

            if (!$location || !in_array($location->countryCode, $this->allowedCountries)) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Sorry! Registration from your country is currently not possible.',
                        'country' => $location ? $location->countryName : 'Unknown'
                    ], 403);
                }

                return redirect()->route('home')->with('error',
                    'Sorry! Registration from your country is currently not possible. Registration is only possible from Bangladesh, the United States, the United Kingdom, and Canada.'
                );
            }

            session([
                'user_country_code' => $location->countryCode,
                'user_country_name' => $location->countryName,
                'user_ip' => $ip,
                'is_bd_user' => ($location?->countryCode === 'BD')
            ]);

        } catch (Exception $e) {
            Log::warning('Location detection failed', [
                'ip' => $ip,
                'error' => $e->getMessage()
            ]);
        }

        return $next($request);
    }

    private function getCountryName(string $code): string
    {
        return match($code) {
            'BD' => 'Bangladesh',
            'US' => 'United States',
            'GB' => 'United Kingdom',
            'CA' => 'Canada',
            default => 'Unknown',
        };
    }
}
