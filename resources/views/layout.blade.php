<!DOCTYPE html>
<html lang="pt-BT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciado de Tarefas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">

    <header class="p-8 bg-blue-900">
        <div class="container">

            <h1 class="text-3xl font-bold text-white">Gerenciamento de Tarefas</h1>

        </div>
    </header>

    <main class="p-8 bg-gray-100 flex-1">
        <div class="container">
        @yield('content')
        </div>
    </main>
    
</body>
</html>