<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Facades\File;

class ArticlesController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $allArticles = Article::with(['nivel'])->get();
        return view('articles.index', [
            'articles' => $allArticles,
        ]);
    }

    public function view(int $id)
    {
        // Obtener el artículo por su ID
        $article = Article::findOrFail($id);

        // Pasar el contenido HTML a la vista
        return view('articles.view', [
            'article' => $article,
        ]);
    }
}
