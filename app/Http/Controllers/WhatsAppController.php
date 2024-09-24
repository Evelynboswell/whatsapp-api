<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FonnteService;

class WhatsAppController extends Controller
{
    protected $fonnteService;

    public function __construct(FonnteService $fonnteService)
    {
        $this->fonnteService = $fonnteService;
    }

    /**
     * Send a WhatsApp message
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendWhatsAppMessage(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $response = $this->fonnteService->sendMessage($validatedData['phone'], $validatedData['message']);

        return response()->json($response);
    }
}
