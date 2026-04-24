<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  public function index()
  {
    $articles = Article::where('status', 'published')
      ->with('category', 'user')
      ->latest()
      ->get();

    $categories = Category::all();
    return view('articles.index', compact('articles', 'categories'));
}

public function show(Article $article)
{
  return view ('articles.show', compact('article'));
}

public function byCategory(Category $category)
{
  $articles = Articale::where('status', 'published')
    ->where('category_id', $category->id)
    ->with('category', 'user')
    ->latest()
    ->get();

  $categories = Category::all();
  return view('articles.index', compact('articles', 'categories'));
}

public function dashboard()
{
  $articles = Article::where('user_id', Auth::id())
  ->with('category')
  ->latest()
  ->get();
  return view('dashboard', compact('articles'));
}

public function create()
{
  $categories = Category::all();
  return view('articles.create', compact('categories'));
}

public function store(Request $request)
{
  $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'status' => 'required|in:draft,published',
    'category_id' => 'required|exists:categories,id',
  ]);

  Article::create([
    'title' => $request->title,
    'content' => $request->content,
    'status' => $request->status,
    'category_id' => $request->category_id,
    'user_id' => Auth::id(),
  ]);

  return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
}

public function update(Request $request, Article $article)
{
  $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'status' => 'required|in:draft,published',
    'category_id' => 'required|exists:categories,id',
  ]);

  $article->update([
    'title' => $request->title,
    'content' => $request->content,
    'status' => $request->status,
    'category_id' => $request->category_id,
  ]);

  return redirect()->route('dashboard')->with('success', 'Article modifié avec succès !');
}

public function destroy(Article $article)
{
  $article->delete();
  return redirect()->route('dashboard')->with('success', 'Article supprimé avec succès !');
}
}