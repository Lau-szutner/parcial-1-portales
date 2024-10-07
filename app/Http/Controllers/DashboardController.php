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
        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen no es obligatoria
            'category' => 'required|string',
            'time-to-read' => 'required|integer',
            'Autor' => 'required|string',
            'content_path' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $data = $request->except(['_token']);
        // dd($data);
        // Crear un nuevo artículo
        Article::create($data);
        // $article->title = $request->input('title');

        // Procesar la imagen solo si se ha subido
        // if ($request->hasFile('img')) {
        //     // Obtener el archivo de imagen
        //     $image = $request->file('img');

        //     // Sanitizar el título para usarlo como nombre de archivo
        //     $imageName = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($article->title)) . '.' . $image->getClientOriginalExtension();

        //     // Mover la imagen a la carpeta 'public/articles/images'
        //     $image->move(public_path('articles/images'), $imageName);

        //     // Guardar la ruta de la imagen en el artículo
        //     $article->img = 'articles/images/' . $imageName; // Asegúrate de que la ruta sea correcta
        // } else {
        //     $article->img = null; // Si no se sube imagen, establecer en null
        // }

        // Guardar otros campos
        // $article->category = $request->input('category');
        // $article->time_to_read = $request->input('time-to-read');
        // $article->Autor = $request->input('Autor');
        // $article->content_path = $request->input('content_path');
        // $article->descripcion = $request->input('descripcion');

        // // Guardar el artículo en la base de datos
        // $article->save();



        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo se publicó exitosamente');
    }
}
