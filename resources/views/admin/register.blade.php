<x-layout>
    <x-slot:title>Registro</x-slot:title>
    <main class="container mx-auto grid justify-items-center">
        <h2 class="text-5xl my-10">Registro</h2>

        @if ($errors->any())
        <div class="bg-red-500 p-5 text-center text-white">Hubo errores en los datos ingresados</div>
        @endif


        <form action="{{ route('register') }}" method="post" class=" grid bg-[var(--primary-color)] p-10 rounded-lg w-6/12 gap-8">
            @csrf

            <div class="flex flex-col">
                <label for="name" class="text-2xl text-white">Nombre</label>
                <input type="text" name="name" id="name" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su nombre de usuario" value="{{ old('name') }}">
            </div>

            <div class="flex flex-col">
                <label for="email" class="text-2xl text-white">Email</label>
                <input type="email" name="email" id="email" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su nombre de usuario" value="{{ old('email') }}">
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-2xl text-white">Contraseña</label>
                <input type="password" name="password" id="password" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su contraseña">
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation" class="text-2xl text-white">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su contraseña">
            </div>

            <div class="grid gap-2">
                <button type="submit" class="block bg-[var(--secondary-color)] h-10 rounded-lg w-full text-white flex items-center justify-center hover:scale-105 transition">Iniciar</button>
                <a href="{{ route('login') }}"
                    class="block bg-[var(--secondary-color)] h-10 rounded-lg w-full text-white flex items-center justify-center hover:scale-105 transition">
                    Login
                </a>
            </div>

            @if ($errors->any())
            <ul class="px-4 py-2 bg-red-500">
                @foreach ($errors -> all() as $error)
                <li class="my-2 text-black">{{$error}}</li>
                @endforeach
            </ul>
            @endif

        </form>
    </main>
</x-layout>