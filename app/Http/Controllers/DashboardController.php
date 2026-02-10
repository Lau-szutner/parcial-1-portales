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
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        'category' => 'required|string|min:2',
        'time' => 'required|string|min:10',
        'body' => 'required|string|min:10',
        'excerpt' => 'required|string',
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

        $request->validate($this->validationRules, $this->validationMessages);

        // 2. Preparar los datos (Quitamos el token y los tópicos de entrada)
        $data = $request->except(['_token', 'topicos_fk']);

        // 3. LOGICA DEL AUTOR: Extraer del usuario autenticado e inyectar en $data
        $data['author'] = Auth::user()->name;

        // 4. Manejo de la imagen
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['img'] = 'images/' . $imageName;
        }

        // 5. Crear el artículo con los datos que ya incluyen el 'author'
        $article = Article::create($data);

        // 6. Asociar tópicos
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

        // 4. Le entregamos las 3 cosas a la vista
        return view('admin.edit', [
            'article' => $article,
            'nivels'  => $nivels,
            'topics'  => $topics
        ]);
    }

    public function update(Request $request, int $id)
    {
        // 1. Tomamos las reglas base y cambiamos 'required' por 'nullable'
        $rules = $this->validationRules;
        $rules['img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048';

        // 2. Validamos con las reglas modificadas
        $request->validate($rules, $this->validationMessages);

        $article = Article::findOrFail($id);

        // 3. Preparamos los datos (filtramos lo que no va a la tabla articles)
        $data = $request->except(['_token', '_method', 'topicos_fk', 'img']);

        // 4. Aseguramos el autor desde el usuario logueado
        $data['author'] = Auth::user()->name;

        // 5. Si el usuario subió una imagen (WebP, AVIF, etc.), la procesamos
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Guardamos la nueva ruta en el array de datos
            $data['img'] = 'images/' . $imageName;
        }

        // 6. Actualizamos los campos de texto e imagen (si se cambió)
        $article->update($data);

        // 7. Sincronizamos los tópicos en la tabla intermedia
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
                ->with('feedback.type', 'error') // Establecer el tipo de mensaje
                ->withInput();
        }

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'Sesión iniciada')
            ->with('feedback.type', 'success'); // Establecer el tipo de mensaje
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
