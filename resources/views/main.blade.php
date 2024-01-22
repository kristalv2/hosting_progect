<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Список</title>
        <meta name="description" content="Create your shopping list on this website">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"/>
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            .bg-info{ border: 0;}
            .link-light{ font-weight: 500;}
            .btn-success{border-radius: 12px 0 0 0}
            .btn-danger{border-radius: 0 12px 0 0}
            .btn-save{border-radius: 0 0 12px 12px}
            .translate-middle{margin-top: -1.5em}
            .input-group{height:40px}
            .btn-close{
                --bs-btn-close-opacity: 1;
                border: 1px #dee2e6 solid
            }
            .overflow-auto{
                height: 450px;
                max-height: 430px;
            }
            input[type="checkbox"]{
                width: 50px;
                height: 40px;
            }
            a{
                text-decoration: none;
                font-weight: 400;
            }
            .vr{
                width: 3px;
                height: 1.5em;
                margin-bottom: -0.25em;
            }
            .bg-form{
                background: #f2f2f2;
                border-radius: 12px 12px 25px 25px;
                width: 350px;
                height: 500px;
            }
        </style>
    </head>
    <body class="bg-dark d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-white mt-2">Список покупок</h1>
        <div class="bg-form mt-4 col">
            <div class="d-flex flex-row">
                <button class="btn btn-success w-50" id="add_button">Добавить</button>
                <button class="btn btn-danger w-50" id="all_button">Удалить все</button>
            </div>
            @if(Auth::check())
                <form class="container overflow-auto" id="List">
                    {!! $blueprint !!}
                </form>
                <a class="d-flex justify-content-center btn btn-success btn-save" href="{{route('main.get')}}">Сохранение</a>
            @else
                <form class="container overflow-auto mb-4" id="List">
                    {!! $blueprint !!}
                </form>
            @endif
        </div>
        <div class="position-absolute top-100 start-50  translate-middle">
            @if(isset(Auth::user()->email))
                <a  class="link-light" href="/login">Привет {{Auth::user()->name}}!</a>
                <a class="btn btn-close bg-body" href="{{route('logout')}}"></a>
            @else
                <a class="link-light" href="/login">Вход</a>
                <div class="vr text-white"></div>
                <a class="link-light" href="/register">Регистрация</a>
           @endif
        </div>
        <script>
            let counter = {!! $counter !!};
            document.getElementById('add_button').addEventListener('click', addNewItem);
            document.getElementById('all_button').addEventListener('click', deleteAllItems);
            document.addEventListener('DOMContentLoaded', update);

            function addNewItem() {
                counter += 1;
                let el = `
                    <div class="input-group mb-2">
                        <input class="form-check-input" type="checkbox" name="items[${counter}][checked]">
                        <input class="form-control main-input w-50 mt-1" type="text" name="items[${counter}][product]" value="новая запись" maxlength="25">
                        <input class="form-control mt-1" type="number" name="items[${counter}][count]" value="1" maxlength="4">
                        <input type="button" class="delete_button btn btn-close h-auto mt-1 bg-white">
                    </div>
                `;
                document.getElementById('List').insertAdjacentHTML('beforeend', el);
                const newDeleteButton = document.getElementById('List').lastElementChild.getElementsByClassName('delete_button')[0];
                newDeleteButton.addEventListener('click', deleteItem);
            }

            function deleteAllItems() {
                counter = 0;
                document.getElementById('List').innerHTML = '';
            }

            function update() {
                const deleteButtons = document.getElementsByClassName('delete_button');
                for (let i = 0; i < deleteButtons.length; i++) {
                    deleteButtons[i].addEventListener('click', deleteItem);
                }
                const checkButtons = document.getElementsByClassName('form-check-input');
                for (let i = 0; i < checkButtons.length; i++) {
                    checkButtons[i].addEventListener('click', checked);
                }
            }
            function deleteItem(){
                this.parentNode.parentNode.removeChild(this.parentNode);
                counter -= 1;
            }
        </script>
    </body>
</html>
