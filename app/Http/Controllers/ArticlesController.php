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
        $articles = Article::all();
        return view('articulos.index', [
            'articles' => $articles,
        ]);
    }

    public function view(int $id)
    {
        // Obtener el artículo por su ID
        $article = Article::findOrFail($id);

        // Obtener la ruta completa del archivo markdown

        // Obtener la ruta completa del archivo markdown
        $filePath = public_path($article->content_path);

        // Imprimir la ruta para depuración
        // dd($filePath); // Verifica que la ruta sea correcta
        // Verificar si el archivo existe
        if (!File::exists($filePath)) {
            abort(404, "El archivo del artículo no fue encontrado.");
        }

        // Leer el contenido del archivo markdown
        $markdownContent = File::get($filePath);

        // Convertir el contenido markdown a HTML usando el método `convert()`
        $converter = new CommonMarkConverter();
        $htmlContent = $converter->convert($markdownContent)->getContent(); // Modificado aquí

        // Pasar el contenido HTML a la vista
        return view('articulos.view', [
            'article' => $article,
            'htmlContent' => $htmlContent, // Pasamos el HTML convertido
        ]);
    }
}
