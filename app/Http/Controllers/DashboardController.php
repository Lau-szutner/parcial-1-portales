<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Nivel;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth; // Importa la clase Auth
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\ArrayRule;
use Illuminate\Validation\Rules\In;


class DashboardController extends Controller
{


    private array $validationRules = [
        'topicos_fk' => 'required|array',
        'topicos_fk.*' => 'exists:topics,topic_id',
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
        // Obtén todos los usuarios con sus cursos
        $users = User::with('cursos')->get();

        return view('admin.dashboard', [
            'articles' => $articles,
            'users' => $users, // Pasamos los usuarios y cursos a la vista
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'nivels' => Nivel::all(),
            'topics' => Topic::all()
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate($this->validationRules, $this->validationMessages);

        // Manejar la carga de la imagen (similar a tu código existente)
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data = $request->except(['_token', 'topicos_fk']);
            $data['img'] = 'images/' . $imageName;
        } else {
            $data = $request->except(['_token', 'img', 'topicos_fk']);
        }

        // Crear el artículo
        $article = Article::create($data);

        // Asociar los tópicos seleccionados al artículo
        if ($request->has('topicos_fk')) {
            $article->topics()->sync($request->input('topicos_fk'));
        }

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


    public function auth(Request $request)
    {

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
