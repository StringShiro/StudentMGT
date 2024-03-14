<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        <style>
            table{
                border-collapse: collapse;
                width: 100%;
            }
            td,th{
                border-bottom: 0.5px solid grey;
            }
        </style>
    </head>
    <body>
        {{ $slot }}

        @livewireStyles
    </body>
</html>
