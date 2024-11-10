<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
    
        $articles = Article::with(['nivel', 'topics'])->get();


        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function view(int $id)
    {
        // Obtener el artículo por su ID, incluyendo los tópicos
        $article = Article::with('topics')->findOrFail($id);

        // Pasar el artículo a la vista
        return view('articles.view', [
            'article' => $article,
        ]);
    }
}
