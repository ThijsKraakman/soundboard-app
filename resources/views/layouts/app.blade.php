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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-200 min-h-screen" id="app">
        <nav class="flex items-center justify-between bg-gray-800 p-6">
            <div class="flex items-center text-white text-lg mr-6">
                <i class="material-icons mr-2">music_note</i>
                <a href="{{ url('/sounds') }}">Soundboard app</a>
            </div>
            @guest
            <button class="flex items-center text-white mr-6 no-underline focus:outline-none">
                <i class="material-icons mr-2">person</i>
                <a href="{{ route('login') }}">Login</a>
            </button>
            @endguest
            @auth
            <dropdown>
                <template v-slot:trigger>
                    <button class="flex items-center text-white mr-6 no-underline focus:outline-none">
                        <i class="material-icons mr-2">person</i>
                        <a>{{ auth()->user()->username }}</a>
                    </button>
                </template>

                <a href="{{ route('profile.show', auth()->user()->username) }}" class="block text-default no-underline text-sm leading-10 px-4 hover:bg-gray-400">Profile</a>
                <a href="{{ route('logout') }}" class="block text-default no-underline text-sm leading-10 px-4 hover:bg-gray-400"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </dropdown>
            @endauth
        </nav>

        <main class="container bg-gray-200 mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
