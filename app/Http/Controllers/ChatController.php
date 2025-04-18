<?php

// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI; // Pacote OpenAI Laravel

class ChatController extends Controller
{
    public function processMessage(Request $request)
    {
        // Validar a mensagem
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = $request->input('message');
        
        // Aqui você faz a chamada à OpenAI
        $openAIResponse = OpenAI::chat([
            'messages' => [
                ['role' => 'system', 'content' => 'Você é um assistente útil.'],
                ['role' => 'user', 'content' => $userMessage],
            ],
            'model' => 'gpt-3.5-turbo', // ou o modelo que você estiver usando
        ]);

        $botMessage = $openAIResponse['choices'][0]['message']['content'];

        return response()->json(['response' => $botMessage]);
    }
}
