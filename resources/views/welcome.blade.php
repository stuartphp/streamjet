<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="text-gray-600">
        @include('test1')
    <script>
        const burger = document.querySelector('#burger');
        const menu = document.querySelector('#menu');
        burger.addEventListener('click', ()=>{
            if(menu.classList.contains('hidden')){
                menu.classList.remove('hidden');
            }else{
                menu.classList.add('hidden');
            }
        });
    </script>
    <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    </body>
</html>
