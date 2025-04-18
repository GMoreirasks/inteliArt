<!-- resources/views/ebooks/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar eBook</title>
</head>
<body>
    <h1>Editar eBook</h1>

    <form action="{{ route('ebooks.update', $ebook) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $ebook->title) }}" required>
        </div>

        <div>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" required>{{ old('description', $ebook->description) }}</textarea>
        </div>

        <div>
            <label for="cover_image">Imagem de Capa</label>
            <input type="file" name="cover_image" id="cover_image">
        </div>

        <div>
            <label for="purchase_link">Link de Compra</label>
            <input type="url" name="purchase_link" id="purchase_link" value="{{ old('purchase_link', $ebook->purchase_link) }}" required>
        </div>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
