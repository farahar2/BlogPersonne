@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            📝 Articles
        </h1>
    </div>

    {{-- FILTRE PAR CATÉGORIE --}}
    <div class="flex gap-2 mb-6 flex-wrap">
        <a href="{{ route('articles.index') }}"
           class="px-4 py-2 rounded-full bg-indigo-600 text-white text-sm">
            Tous
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('articles.byCategory', $cat) }}"
               class="px-4 py-2 rounded-full bg-white text-gray-700 text-sm shadow hover:bg-indigo-100">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    {{-- LISTE DES ARTICLES --}}
    @if($articles->isEmpty())
        <p class="text-gray-500">Aucun article publié pour le moment.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="bg-white rounded-lg shadow p-6">

                    {{-- Catégorie --}}
                    <span class="text-xs text-indigo-600 font-semibold uppercase">
                        {{ $article->category->name }}
                    </span>

                    {{-- Titre --}}
                    <h2 class="text-xl font-bold mt-2 mb-2 text-gray-800">
                        {{ $article->title }}
                    </h2>

                    {{-- Extrait --}}
                    <p class="text-gray-600 text-sm mb-4">
                        {{ Str::limit($article->content, 120) }}
                    </p>

                    {{-- Date --}}
                    <p class="text-xs text-gray-400 mb-4">
                        {{ $article->created_at->format('d/m/Y') }}
                    </p>

                    {{-- Lire la suite --}}
                    <a href="{{ route('articles.show', $article) }}"
                       class="text-indigo-600 font-semibold hover:underline text-sm">
                        Lire la suite →
                    </a>

                </div>
            @endforeach
        </div>
    @endif

@endsection