<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        // Cargar artículos con la relación 'nivel' y 'topics'
        $articles = Article::with(['nivel', 'topics'])->get();
        // Debugging la relación topics para un artículo específico
        // $article = Article::find(1);  // Reemplaza con un artículo que sabes que debería tener tópicos
        // dd($article->topics);  // Esto debería mostrar la colección de topics asociados

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
