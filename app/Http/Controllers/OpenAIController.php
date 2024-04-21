<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // $receivedmessageOpenAi = $openai->response->choices[0]->text;
        //toda la logica de openai y luego insertar a la tabla message el mensaje enviado como sent y la respuesta como received
        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->message = $request->message;
        $message->type = 'sent';
        $message->save();

        $receivedmessage = new Message();
        $receivedmessage->user_id = auth()->user()->id;
        $receivedmessage->message = 'Hola, soy un bot';
        $receivedmessage->type = 'received';
        $receivedmessage->save();
        
        return response()->json(
            [
                'message' => 'success',
                'data' => [
                    'received_message' => $receivedmessage->message,
                    'sent_message' => $message->message
                    ]
            ]);
    }

}
