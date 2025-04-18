<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Client as OpenAIClient;
use OpenAI\Transporter\HttpTransporter;

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

        // Obter a chave da API do .env
        $apiKey = env('OPENAI_API_KEY');

        // Criar o transportador para o cliente OpenAI
        $transporter = new HttpTransporter();

        // Instanciar o cliente OpenAI
        $client = new OpenAIClient($transporter, $apiKey);

        // Enviar a pergunta para a OpenAI
        $response = $client->completions()->create([
            'model' => 'gpt-3.5-turbo', // Ou outro modelo que você escolher
            'prompt' => $request->input('question'),
            'max_tokens' => 100,
        ]);

        // Pegar a resposta
        $answer = $response['choices'][0]['text'];

        // Retornar a resposta para a view
        return view('test-openai', compact('answer'));
    }
}
