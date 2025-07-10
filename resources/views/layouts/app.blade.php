<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.title') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('posts.index') }}" class="text-xl font-bold text-gray-900">{{ __('Posts') }}</a>
                </div>
                <!--<div class="flex items-center space-x-4">
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-gray-900">{{ __('Posts') }}</a>
                </div>-->
            </div>
        </div>
    </nav>
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @session('success')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ $value }}
            </div>
        @endsession

        @yield('content')
    </main>
</body>
</html>
