<!-- resources/views/ebooks/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo eBook</title>
</head>
<body>
    <h1>Cadastrar Novo eBook</h1>

    <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="cover_image">Imagem de Capa</label>
            <input type="file" name="cover_image" id="cover_image">
        </div>

        <div>
            <label for="purchase_link">Link de Compra</label>
            <input type="url" name="purchase_link" id="purchase_link" value="{{ old('purchase_link') }}" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
