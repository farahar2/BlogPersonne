@extends('layouts.app')

@section('content')

    <div class="bg-white rounded-lg shadow p-8 max-w-3xl mx-auto">

        {{-- Catégorie --}}
        <span class="text-xs text-indigo-600 font-semibold uppercase">
            {{ $article->category->name }}
        </span>

        {{-- Titre --}}
        <h1 class="text-3xl font-bold mt-2 mb-4 text-gray-800">
            {{ $article->title }}
        </h1>

        {{-- Date --}}
        <p class="text-sm text-gray-400 mb-6">
            Publié le {{ $article->created_at->format('d/m/Y') }}
        </p>

        {{-- Contenu --}}
        <div class="text-gray-700 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>

        {{-- Retour --}}
        <div class="mt-8">
            <a href="{{ route('articles.index') }}"
               class="text-indigo-600 hover:underline">
                ← Retour aux articles
            </a>
        </div>

    </div>

@endsection