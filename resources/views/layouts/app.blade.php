<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow mb-8">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
                📝 Mon Blog
            </a>

            {{-- Menu --}}
            <div class="flex gap-4 items-center">

                <a href="{{ route('articles.index') }}"
                   class="text-gray-600 hover:text-indigo-600">
                    Articles
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-gray-600 hover:text-indigo-600">
                        Dashboard
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Déconnexion
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Connexion
                    </a>
                @endguest

            </div>
        </div>
    </nav>

    {{-- MESSAGES DE SUCCÈS --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto px-4 mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- CONTENU PRINCIPAL --}}
    <main class="max-w-6xl mx-auto px-4 pb-8">
        @yield('content')
    </main>

</body>
</html>