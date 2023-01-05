<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>THC - Hiker</title>
        <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"> -->
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="p-2 bg-white">
                <form method="POST" action="{{ route('welcome.show') }}">
                    @csrf
                    <label for="trailName">Enter Trail Name:</label>
                    <input id="trailName" name="trailName">

                    </input>
                    <x-primary-button>Find Hiker</x-primary-button>
                </form></br>
                @if(count($hiker)>0)
                    <div class="flex flex-col px-6">
                        <!-- {{$hiker}} -->
                        <div class="m-1 flex-1">
                            <div class="flex items-center justify-around">
                                <div class="ml-1 max-w-full">
                                    User Name
                                </div>
                                <div class="ml-1 max-w-full">
                                    Trail Name
                                </div>
                                <div class="ml-1 max-w-full">
                                    Hiked Trail Name
                                </div>
                            </div>
                        </div>
                    @foreach($hiker as $tmpHiker)
                        <div class="m-1 flex-1">
                            <div class="flex  items-center justify-around">
                                <div class="ml-1">
                                    {{$tmpHiker->userName}}
                                </div>
                                <div class="ml-1">
                                    {{$tmpHiker->trail_name}}
                                </div>
                                <div class="ml-1">
                                    <a href="{{route('trails.show', $tmpHiker->trail_id)}}"> {{$tmpHiker->name}} </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

</html>
