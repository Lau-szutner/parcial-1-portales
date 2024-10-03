<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::take(3)->get();

        return view('home', [
            'articles' => $articles,
        ]);
    }
}
