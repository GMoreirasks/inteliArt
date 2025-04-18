<!-- resources/views/ebooks/show.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ebook->title }}</title>
</head>
<body>
    <h1>{{ $ebook->title }}</h1>

    <p><strong>Descrição:</strong> {{ $ebook->description }}</p>

    @if($ebook->cover_image)
        <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="Imagem de Capa" width="200">
    @endif

    <p><strong>Link de Compra:</strong> <a href="{{ $ebook->purchase_link }}" target="_blank">{{ $ebook->purchase_link }}</a></p>

    <a href="{{ route('ebooks.index') }}">Voltar para a lista de eBooks</a>
</body>
</html>
