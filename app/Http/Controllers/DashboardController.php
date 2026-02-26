<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Curso;
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
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        'category' => 'required|string|min:2',
        'time' => 'required|numeric|min:1', 
        'body' => 'required|string|min:10',
        'excerpt' => 'required|string|min:5',
        'nivel_fk' => 'required|exists:nivels,nivel_id', 
    ];

    private array $validationMessages = [
        'title.required' => 'El titulo es requerido.',
        'img.required' => 'La imagen es requerida',
        'category.required' => 'La categoria es requerida',
        'time.required' => 'El tiempo aproximado es requerido',
        'body.required' => 'El contenido es requerido',
        'excerpt.required' => 'La descripcion es requerida',

    ];
    public function dashboard()
    {
        $articles = Article::all();
        $cursos = Curso::all();
        $users = User::with('cursos')->get();

        return view('admin.dashboard', [
            'articles' => $articles,
            'cursos' => $cursos,
            'users' => $users, 
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

        $request->validate($this->validationRules, $this->validationMessages);

        $data = $request->except(['_token', 'topicos_fk']);

        $data['author'] = Auth::user()->name;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['img'] = 'images/' . $imageName;
        }

        $article = Article::create($data);

        if ($request->has('topicos_fk')) {
            $article->topics()->sync($request->input('topicos_fk'));
        }

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo <b>' . e($article->title) . '</b> se publicó exitosamente');
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

        $article = Article::findOrFail($id);

        $nivels = Nivel::all();

        $topics = Topic::all();

        return view('admin.edit', [
            'article' => $article,
            'nivels'  => $nivels,
            'topics'  => $topics
        ]);
    }

    public function update(Request $request, int $id)
    {
        $rules = $this->validationRules;
        $rules['img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048';

        $request->validate($rules, $this->validationMessages);

        $article = Article::findOrFail($id);

        $data = $request->except(['_token', '_method', 'topicos_fk', 'img']);

        $data['author'] = Auth::user()->name;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $data['img'] = 'images/' . $imageName;
        }

        $article->update($data);

        $article->topics()->sync($request->input('topicos_fk', []));

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'El artículo <b>' . e($article->title) . '</b> se editó exitosamente');
    }


    public function auth(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect()
                ->route('login')
                ->with('feedback.message', 'Las credenciales son incorrectas')
                ->with('feedback.type', 'error') 
                ->withInput();
        }

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'Sesión iniciada')
            ->with('feedback.type', 'success'); 
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

public function cursoCreate()
{
    
    return view('admin.cursoCreate', [
        'nivels' => Nivel::all(), 
        'topics' => Topic::all()
    ]);
}

    public function cursoDelete(int $id)
    {
        return view('admin.cursoDelete', [
            'curso' =>  Curso::findOrFail($id)
        ]);
    }
    
    public function cursoDestroy(int $id)
    {
        $curso = Curso::findOrFail($id);

        $curso->users()->detach();

        $curso->delete();

        return redirect()->route('dashboard')
            ->with('feedback.message', 'El curso y sus inscripciones han sido eliminados.')
            ->with('feedback.type', 'success');
    }

    public function cursoEdit(int $id)
    {
        $curso = Curso::findOrFail($id);

        return view('admin.cursoEdit', [
            'curso' => $curso,
            'nivels' => Nivel::all(),
            'topics' => Topic::all()
        ]);
    }

    public function cursoUpdate(Request $request, int $id)
    {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nombre'      => 'required|min:5|max:100',
            'descripcion' => 'required|min:20',
            'duracion'    => 'required|numeric|min:1',
            'nivel'       => 'required|in:1,2,3',
            'imagen'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        // Gestión de la imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/cursos'), $nombreImagen);
            $data['imagen'] = 'img/cursos/' . $nombreImagen;
        }

        $curso->update($data);

        return redirect()->route('dashboard')
            ->with('feedback.message', 'El curso <b>' . e($curso->nombre) . '</b> se editó exitosamente')
            ->with('feedback.type', 'success');
    }

    public function cursoStore(Request $request) 
{
    $request->validate([
        'nombre'      => 'required|min:5|max:100',
        'descripcion' => 'required|min:20',
        'duracion'    => 'required|numeric|min:1',
        'nivel'       => 'required|in:1,2,3',
        'imagen'      => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $data = $request->all();


    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $nombreImagen = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/cursos'), $nombreImagen);
        $data['imagen'] = 'img/cursos/' . $nombreImagen;
    }

    Curso::create($data);

    return redirect()->route('dashboard')
        ->with('feedback.message', '¡Curso creado con éxito!');
}

    public function userDestroy(User $user)
    {
        $user->cursos()->detach();

        $user->subscriptions()->delete();

        $user->delete();

        return redirect()->route('dashboard')
            ->with('feedback.message', 'Usuario eliminado exitosamente.')
            ->with('feedback.type', 'success');
    }
}
