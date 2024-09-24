<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('FONNTE_API_KEY');
        $this->baseUrl = env('FONNTE_BASE_URL');
    }

    /**
     * Send WhatsApp message using Fonnte API
     *
     * @param string $phone
     * @param string $message
     * @return array
     */
    public function sendMessage(string $phone, string $message)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey
        ])->withoutVerifying()->post($this->baseUrl . '/send', [
                    'target' => $phone,
                    'message' => $message,
                ]);

        return $response->json();
    }

}
