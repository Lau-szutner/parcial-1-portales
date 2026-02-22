<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Curso;


class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::take(6)->get();

        return view('home', [
            'articles' => $articles,
        ]);
    }

    public function cursos()
    {
        $cursos = Curso::all();
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }
}
