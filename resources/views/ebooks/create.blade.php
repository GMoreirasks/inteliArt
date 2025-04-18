<!-- resources/views/ebooks/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo eBook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-black min-h-screen flex flex-col items-center">

    <div class="w-full max-w-4xl p-6">
        <div class="text-center space-y-6">
            <h1 class="text-4xl font-bold text-[#293039]">Cadastrar Novo eBook</h1>

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-left text-lg font-medium">Título</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="description" class="block text-left text-lg font-medium">Descrição</label>
                    <textarea name="description" id="description" required
                              class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="cover_image" class="block text-left text-lg font-medium">Imagem de Capa</label>
                    <input type="file" name="cover_image" id="cover_image"
                           class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="purchase_link" class="block text-left text-lg font-medium">Link de Compra</label>
                    <input type="url" name="purchase_link" id="purchase_link" value="{{ old('purchase_link') }}" required
                           class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <button type="submit"
                        class="w-full bg-[#5271ff] hover:bg-[#858585] text-white py-3 rounded-md shadow transition duration-300">
                    Cadastrar
                </button>
            </form>

            <a href="{{ url('/') }}"
               class="bg-[#5271ff] hover:bg-[#858585] text-white px-6 py-3 rounded shadow transition duration-300 inline-block mt-6">
               Voltar para Home
            </a>
        </div>
    </div>

</body>
</html>
