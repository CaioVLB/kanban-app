<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }"
    x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }" @toggle-dark-mode.window="isDarkMode = !isDarkMode">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
        </div>
        {{-- 
            -> Trocar o nome do arquivo navigation para main (layout).
            -> Fazer um componente sidebar, passar o parametro openSideBar para dentro do arquivo.
            -> Tirar a barra de rolagem (h-screen overflow-y-auto)
         --}}

        {{-- <div class="flex" id="wrapper" x-data="{ isOpen: true }">
            <div id="sidebar" class="h-screen overflow-y-auto transition-all duraction-200 bg-white dark:bg-gray-900"
            :class="isOpen ? 'w-48' : 'w-0'">
                <div class="w-full h-auto flex justify-center p-2 bg-gray-900 dark:bg-gray-100">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                </div>
                <ul>
                    <li>Board</li>
                    <li>Clientes</li>
                </ul>
            </div> --}}
            {{-- <div class="w-full h-screen overflow-y-auto transition-all duraction-200 bg-gray-100 dark:bg-gray-900">
                <div class="w-full h-screen overflow-y-auto bg-gray-900 dark:bg-gray-100">
                    <button @click.prevent="isOpen = ! isOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                    </button>
                </div>
                <div class="p-2">

                </div>
            </div> --}}
        {{-- </div> --}}
    </body>
</html>
