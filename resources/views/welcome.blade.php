<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Insulation Calculator</title>
        @vite(['resources/js/app.js'])
        @vite(['resources/sass/app.scss'])
    </head>
    <body class="text-white">
        <div id="app"></div>
    </body>
</html>
