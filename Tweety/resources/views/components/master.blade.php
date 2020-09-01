<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <div class="flex justify-between">
                    <h1>
                        <img
                            src="/images/logo.svg"
                            alt="Tweety"
                        >
                    </h1>
                    <div>
                        @guest
                            <a href="{{ route('login') }}" class="{{ Request::path() == '/login' ? 'text-gray-400 font-semibold' : 'font-bold' }} mr-3 ">Login</a>    
                            <a href="{{ route('register') }}"class="{{ Request::path() == '/register' ? 'text-gray-400 font-semibold' : 'font-bold' }}">Register</a>
                        @endguest
                    </div>
                </div>
            </header>
        </section>

        {{ $slot }}
        
    </div>
    <body>
            
</body>
</html>