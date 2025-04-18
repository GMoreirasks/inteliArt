<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class OpenAIController extends Controller
{
    public function index()
    {
        return view('test-openai');
    }

    public function ask(Request $request)
    {
        // Validar a entrada do usuário
        $request->validate([
            'question' => 'required|string',
        ]);

        // Instanciar o cliente OpenAI
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        // Enviar a pergunta para a OpenAI
        // Note que para o modelo gpt-3.5-turbo você deve usar o método chat()
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $request->input('question')],
            ],
            'max_tokens' => 100,
        ]);

        // Pegar a resposta
        $answer = $response['choices'][0]['message']['content'];

        // Retornar a resposta para a view
        return view('test-openai', compact('answer'));
    }
}