<!-- resources/views/ebooks/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de eBooks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        td {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body class="bg-white text-black min-h-screen flex flex-col items-center">

    <div class="w-full max-w-4xl p-6">
        <div class="text-center space-y-6">
            <h1 class="text-4xl font-bold text-[#293039]">Lista de eBooks</h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('ebooks.create') }}"
                class="bg-[#5271ff] hover:bg-[#858585] text-white px-6 py-3 rounded shadow transition duration-300 inline-block">
                Cadastrar Novo eBook
            </a>

            <a href="{{ url('/') }}"
                class="bg-[#5271ff] hover:bg-[#858585] text-white px-6 py-3 rounded shadow transition duration-300 inline-block mt-4">
                Voltar para Home
            </a>

            <table class="min-w-full mt-6 border-separate border-spacing-2">
                <thead>
                    <tr>
                        <th class="text-left p-3 text-[#293039] font-medium">Título</th>
                        <th class="text-left p-3 text-[#293039] font-medium">Descrição</th>
                        <th class="text-left p-3 text-[#293039] font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ebooks as $ebook)
                        <tr>
                            <td class="border p-3">{{ $ebook->title }}</td>
                            <td class="border p-3">{{ substr($ebook->description, 0, 50) }}...</td>
                            <td class="border p-3">
                                <a href="{{ route('ebooks.show', $ebook->id) }}"
                                    class="text-blue-500 hover:underline mr-2">Ver Detalhes</a>
                                <a href="{{ route('ebooks.edit', $ebook) }}"
                                    class="text-yellow-500 hover:underline mr-2">Editar</a>
                                <form action="{{ route('ebooks.destroy', $ebook) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>