<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Список</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"/>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            form{padding: 20px}
            form > *{margin-bottom: 0.5em}
            a{
                color: #1a202c;
                font-weight: 500;
                text-decoration: none
            }
        </style>
    </head>
    <body class="bg-dark d-flex flex-column align-items-center">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('login.post')}}" method="post" class="was-validated bg-white rounded-2 mt-3 d-flex flex-column align-items-center">
            <h1>Вход</h1>
            {{csrf_field()}}
            <label><input class="form-control" type="email" name="email" placeholder="Почта" required></label>
            <label><input class="form-control" type="password" name="password" placeholder="Пароль" required></label>
            <a href="/register">Регистрация</a>
            <input class="btn btn-primary fs-4 mt-1" type="submit" name="login" value="Вход">
        </form>
        <a class="text-white d-flex justify-content-center text-decoration-none mt-1" href="/">Главная страница</a>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    </body>
</html>
