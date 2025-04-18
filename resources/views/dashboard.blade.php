<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Bem-vindo, {{ Auth::user()->name }}!</p>
</body>
</html>
