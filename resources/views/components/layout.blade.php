<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clauty :: {{ $title }} </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[var(--accent-color)] h-screen flex flex-col">
    <nav class="bg-[var(--primary-color)] text-white p-6 flex justify-between">
        <div class="flex items-center">
            <h1 class="text-4xl">Clauty.com</h1>
        </div>
        <ul class="flex gap-10 items-center">
            <li>
                <x-nav-link route="home">Home</x-nav-link>
            </li>
            <li>
                <x-nav-link route="cursos.index">Cursos</x-nav-link>
            </li>
            <li>
                <x-nav-link route="articulos.index">Artículos</x-nav-link>
            </li>
        </ul>
        @auth
        <div class="flex flex-col gap-2">
            <form action="{{ route('admin.doLogout') }}" method="post">
                @csrf
                <button type="submit" class="p-2 h-10 w-30 bg-[var(--secondary-color)] rounded-lg">
                    {{ auth()->user()->email }} (Cerrar sesión)
                </button>
            </form>

            @if (auth()->user()->rol === 'admin')
            <a href="{{ route('dashboard') }}"
                class="p-2 h-10 w-30 bg-[var(--secondary-color)] rounded-lg text-center">Admin</a>
            @else
            <a href="{{ route('user.cursos') }}"
                class="p-2 h-10 w-30 bg-[var(--secondary-color)] rounded-lg text-center">Perfil</a>
            @endif
        </div>
        @else
        <div class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg">
            <x-nav-link route="login" class="text-center">Login</x-nav-link>
        </div>
        @endauth
    </nav>

    @if (session()->has('feedback.message'))
    <div
        class="p-5 m-10 w-fit rounded-xl 
            @if (session()->get('feedback.type') == 'error') bg-red-500 text-white 
            @elseif(session()->get('feedback.type') == 'success') 
                bg-green-500 text-white @endif
        ">
        {!! session()->get('feedback.message') !!}
    </div>
    @endif

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="w-full mt-20 bg-[var(--primary-color)] text-white p-6 flex justify-center gap-10">
        <div>
            <span class="font-bold">Alumno: </span>Lautaro Fernandez Szutner
        </div>
        <div>
            <span class="font-bold">Comision: </span>DWN3AV
        </div>
    </footer>
</body>

</html>