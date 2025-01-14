<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }"
    x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }" @toggle-dark-mode.window="isDarkMode = !isDarkMode">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" id="__token">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        @yield('styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased overflow-y-hidden">
        <div class="min-h-dvh bg-gray-100 dark:bg-gray-900">
            @include('layouts.main')
        </div>

        @if(session()->get('success') || $errors->first())
          <div x-data="{ show: true, init() { setTimeout(() => this.show = false, 4000) } }" x-show="show"
               x-transition:enter="transform ease-out duration-300 transition"
               x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
               x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
               x-transition:leave="transform ease-in duration-100 transition"
               x-transition:leave-start="opacity-100"
               x-transition:leave-end="opacity-0"
               class="fixed top-4 right-4 z-50 max-w-xs w-full {{ session()->get('success') ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700' }} border text-sm font-bold p-4 rounded-lg shadow-lg">
            <span>{{ session()->get('success') ? session()->get('success') : $errors->first() }}</span>
          </div>
        @endif

        @yield('scripts')
    </body>
</html>
