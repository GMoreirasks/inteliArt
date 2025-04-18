<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste OpenAI</title>
    <style>
        .chat-box {
            width: 400px;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: #f9f9f9;
        }

        .chat-box input, .chat-box button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
            border-radius: 5px;
        }

        .response {
            background: #e5e5e5;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="chat-box">
        <h2>Converse com a OpenAI</h2>
        <form action="{{ url('/test-openai') }}" method="POST">
            @csrf
            <label for="question">Digite sua pergunta:</label>
            <input type="text" id="question" name="question" required>
            <button type="submit">Enviar</button>
        </form>

        @if (isset($answer))
            <div class="response">
                <h3>Resposta:</h3>
                <p>{{ $answer }}</p>
            </div>
        @endif
    </div>
</body>
</html>
