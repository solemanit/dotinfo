<?php

namespace App\Services;
class SmsService
{
    private string $apiUrl = "http://bulksmsbd.net/api/smsapi";
    private string $apiKey;
    private string $senderId;

    public function __construct()
    {
        $this->apiKey = config('services.sms.api_key', 'h341ziAIt9rSi2gwpCoq');
        $this->senderId = config('services.sms.sender_id', '8809617619254');
    }

    /**
     * Normalize BD mobile number to 880 format
     */
    private function formatMobile(string $mobile): string
    {
        // Remove non-numeric characters
        $mobile = preg_replace('/\D/', '', $mobile); // Keep numbers only

        // If starts with 01 => Make 8801
        if (preg_match('/^01\d{9}$/', $mobile)) {
            return '880' . substr($mobile, 1);
        }

        // If already correct
        if (preg_match('/^8801\d{9}$/', $mobile)) {
            return $mobile;
        }

        return $mobile; // fallback (won't break things)
    }

    public function sendOtp(string $mobile, string $otp): array
    {
        $mobile = $this->formatMobile($mobile);
        $message = "DotInfo OTP is {$otp}";
        return $this->sendSms($mobile, $message);
    }

    public function sendSms(string $number, string $message): array
    {
        try {
            $data = [
                "api_key" => $this->apiKey,
                "senderid" => $this->senderId,
                "number" => $number,
                "message" => $message
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                return [
                    'success' => false,
                    'message' => 'Failed to send SMS. Please try again.',
                    'error' => $error
                ];
            }

            return [
                'success' => true,
                'message' => 'OTP sent successfully.',
                'response' => $response
            ];

        } catch (\Exception $e) {

            return [
                'success' => false,
                'message' => 'There was a problem sending SMS.',
                'error' => $e->getMessage()
            ];
        }
    }
}
