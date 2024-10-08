<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth; // Importa la clase Auth
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\ArrayRule;
use Illuminate\Validation\Rules\In;

class DashboardController extends Controller
{


    private array $validationRules = [
        'title' => 'required|string|min:2',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'required|string|min:2',
        'time' => 'required|string|min:10',
        'author' => 'required|string|min:2',
        'body' => 'required|string|min:10',
        'excerpt' => 'required|string',
    ];

    private array $validationMessages = [
        'title.required' => 'El titulo es requerido.',
        'img.required' => 'La imagen es requerida',
        'category.required' => 'La categoria es requerida',
        'time.required' => 'El tiempo aproximado es requerido',
        'author.required' => 'El autor es requerido',
        'body.required' => 'El body es requerido',
        'excerpt.required' => 'La descripcion es requerida',

    ];

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

    public function login()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate(
            $this->validationRules,
            $this->validationMessages
        );

        // Manejar la carga de la imagen, si existe
        if ($request->hasFile('img')) {
            // Obtener el archivo de la imagen
            $image = $request->file('img');

            // Generar un nombre único para la imagen
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Almacenar la imagen en la carpeta public/images
            $image->move(public_path('images'), $imageName);

            // Actualizar el campo 'img' en los datos a guardar
            $data = $request->except(['_token']);
            $data['img'] = 'images/' . $imageName; // Guardamos la ruta accesible
        } else {
            // Si no se subió ninguna imagen, solo excluimos el campo 'img' de los datos
            $data = $request->except(['_token', 'img']);
        }

        // Crear el artículo
        Article::create($data);

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo se <b>' . e($data['title']) . ' </b> publicó exitosamente');
    }


    public function delete(int $id)
    {
        return view('admin.delete', [
            'article' =>  Article::findOrFail($id)
        ]);
    }
    public function destroy(int $id)
    {
        $article =  Article::findOrFail($id);
        $article->delete();
        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo se <b>' . e($article['title']) . ' </b> se elimino exitosamente');
    }


    public function edit(int $id)
    {
        return view('admin.edit', [
            'article' =>  Article::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {

        $request->validate(
            $this->validationRules,
            $this->validationMessages
        );

        $article = Article::findOrFail($id);
        $article->update($request->except('_token'));
        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo se <b>' . e($article['title']) . ' </b> se edito exitosamente');
    }


    public function doLogin(Request $request)
    {
        // $articles = Article::all();
        // return view('admin.dashboard', [
        //     'articles' => $articles,
        // ]);


        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return redirect()
                ->route('login')
                ->with('feedback.message', 'Las credenciales son incorrectas')
                ->withInput();
        }
        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'Sesion iniciada');
    }


    public function doLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('home')
            ->with('feedback.message', 'Sesion cerrada');
    }
}
