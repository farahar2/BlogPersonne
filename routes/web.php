<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


//Page d'accueil
Route::get('/', [ArticleController::class, 'index'])->name('home');


//Liste des articles publiés
Route::get('/articales', [ArticleController::class, 'index'])->name('articles.index');


// Détail d'un article
Route::get('/articales/{article}', [ArticleController::class, 'show'])->name('articles.show');


//Filtrage par catégorie
Route::get('/categories/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');



Route::middleware('auth')->group(function () {

    // Tableau de bord
    Route::get('/dashboard', [ArticleController::class, 'dashboard'])->name('dashboard');

    // Créer un article
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // Modifier un article
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

    // Supprimer un article
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

});



require __DIR__.'/auth.php';
