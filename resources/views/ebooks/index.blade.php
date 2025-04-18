<!-- resources/views/ebooks/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de eBooks</title>
</head>
<body>
    <h1>Lista de eBooks</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('ebooks.create') }}">Cadastrar Novo eBook</a>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $ebook)
                <tr>
                    <td>{{ $ebook->title }}</td>
                    <td>{{ $ebook->description }}</td>
                    <td>
                    <a href="{{ route('ebooks.show', $ebook->id) }}">Ver Detalhes</a>
                        <a href="{{ route('ebooks.edit', $ebook) }}">Editar</a>
                        <form action="{{ route('ebooks.destroy', $ebook) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
