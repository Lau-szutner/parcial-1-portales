<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $articles = Article::all();
        return view('admin.dashboard', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        return dd($_POST);
    }
}
