<!-- resources/views/ebooks/show.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ebook->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen flex flex-col items-center">

    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg mt-8 p-6 space-y-8">

        <!-- Título do eBook -->
        <h1 class="text-3xl font-semibold text-center text-blue-600">{{ $ebook->title }}</h1>

        <!-- Descrição -->
        <div class="text-lg text-gray-700">
            <p><strong class="font-medium">Descrição:</strong></p>
            <p>{{ $ebook->description }}</p>
        </div>

        <!-- Imagem de Capa (Se disponível) -->
        @if($ebook->cover_image)
            <div class="text-center">
                <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="Imagem de Capa" class="w-64 mx-auto mt-4 rounded-lg shadow-md">
            </div>
        @endif

        <!-- Link de Compra -->
        <div class="text-lg text-gray-700">
            <p><strong class="font-medium">Link de Compra:</strong></p>
            <a href="{{ $ebook->purchase_link }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                {{ $ebook->purchase_link }}
            </a>
        </div>

        <!-- Botão de Voltar para Lista -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('ebooks.index') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                Voltar para a Lista de eBooks
            </a>
        </div>

    </div>

</body>
</html>
