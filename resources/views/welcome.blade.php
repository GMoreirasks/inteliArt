<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistema de eBooks') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-black min-h-screen flex flex-col justify-center items-center">

    <div class="text-center space-y-6">
        <h1 class="text-4xl font-bold text-[#293039]">Bem-vindo ao Sistema de eBooks!</h1>
        <p class="text-lg">O que você gostaria de fazer?</p>

        <div class="flex gap-4 justify-center">
            <a href="{{ route('ebooks.create') }}"
               class="bg-[#5271ff] hover:bg-[#858585] text-white px-6 py-3 rounded shadow transition duration-300">
               Cadastrar eBook
            </a>

            <a href="{{ route('ebooks.index') }}"
               class="bg-[#5271ff] hover:bg-[#858585] text-white px-6 py-3 rounded shadow transition duration-300">
               Ver EBooks
            </a>
        </div>
    </div>

</body>
</html>
