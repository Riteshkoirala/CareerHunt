<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        // Define the engine and API endpoint URL you want to use
        $engine = 'text-davinci-002'; // Replace with the desired engine name
        $endpoint = "https://api.openai.com/v1/engines/$engine/completions";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.api_key'),
            ])->post($endpoint, [
                'prompt' => $request->input('message'),
                'temperature' => 0.7,
                'max_tokens' => 10,
            ]);

            if ($response->successful()) {
                $chatResponse = $response->json()['choices'][0]['text'] ?? 'Sorry, I could not understand that.';
                return response()->json(['message' => $chatResponse]);
            } else {
                // Handle API response error
                return response()->json(['message' => 'Error: ' . $response->status() . ' - ' . $response->body()]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the request
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


}
