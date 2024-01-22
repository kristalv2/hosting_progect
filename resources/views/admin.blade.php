<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Список</title>
        <meta name="description" content="Create your shopping list on this website">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Rubik+Scribble&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    </head>
    <body class="bg-dark">
    @if(Auth::check() and Auth::user()->id == 1)
        <h1 class="text-white text-center mt-2">Добро пожаловать {{Auth::user()->name}}</h1>
        <div class="container overflow-auto bg-white rounded-3 mt-4 p-2" style="height: 60%;width: 30%;max-height: 80vh">
            <div class="accordion">
                {!! $data !!}
            </div>
        </div>
    @else
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-white mt-2" style="font-size: 4em">В доступе отказанно</h1>
            <a class="text-white text-decoration-none fs-2" href="/login">Войти</a>
        </div>
    @endif
    </body>
</html>
