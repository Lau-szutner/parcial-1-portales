<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticulosController extends Controller
{
    public function articulos()
    {


        $articles = Article::all();

        // dd($articles);
        return view('articles', [
            'articles' => $articles,
        ]);
    }
}
