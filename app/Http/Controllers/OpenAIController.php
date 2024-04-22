<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Message; 

class OpenAIController extends Controller
{
    public function index()
    {
        return view('pages.openai.chat');
    }
    
    public function sendMessage(Request $request)
    {

        $request->validate([
            'message' => 'required'
        ]);

        
        \Log::info("Request received", ['response' => env('OPENAI_KEY')]); 
        // Cliente HTTP para conectar con la API de OpenAI
        $client = new Client();
        try {
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // Ajusta el modelo según tus necesidades
                    'messages' => [['role' => 'user', 'content' => $request->input('message')]],
                ],
            ]);
            \Log::info("Request received", ['response' => $response]); 

            $body = json_decode($response->getBody()->getContents(), true);
            $receivedMessageText = $body['choices'][0]['message']['content']; 
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failure',
                'error' => $e->getMessage()
            ], 500);
        }

        

        
        // Guardar el mensaje enviado
        $sentMessage = new Message();
        $sentMessage->user_id = auth()->user()->id;
        $sentMessage->message = $request->message;
        $sentMessage->type = 'sent';
        $sentMessage->save();

        // Guardar la respuesta recibida
        $receivedMessage = new Message();
        $receivedMessage->user_id = auth()->user()->id;
        $receivedMessage->message = $receivedMessageText;
        $receivedMessage->type = 'received';
        $receivedMessage->save();
        
        // Devolver respuesta JSON con los mensajes
        return response()->json([
            'message' => 'success',
            'data' => [
                'received_message' => $receivedMessage->message,
                'sent_message' => $sentMessage->message
            ]
        ]);
    }
}
