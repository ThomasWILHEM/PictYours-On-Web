<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PictYours</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%">
        <x-card class="mx-80 mt-5">
            <nav>
                <div class="flex justify-between mx-5 my-1">
                    <div>
                        <a href="{{ route('posts.index') }}" class="text-slate-800 text-2xl">Home</a>
                    </div>
                    <div class="text-slate-800 text-3xl">
                        Pictyours
                    </div>
                    <div class="text-slate-800 text-2xl">Username</div>
                </div>                
            </nav>
        </x-card>
        {{$slot}}
    </body>
</html>
