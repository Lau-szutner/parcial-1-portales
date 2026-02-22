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

    public function view(Article $article)
    {
        $article->load('topics', 'nivel');

        return view('articles.view', [
            'article' => $article,
        ]);
    }
}
