<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <h1>Bem-vindo ao Sistema de eBooks!</h1>
    <p>O que você gostaria de fazer?</p>
    <a href="{{ route('ebooks.create') }}">Cadastrar eBook</a> <br>
    <a href="{{ route('ebooks.index') }}">Ver eBooks</a>
</body>
</html>
