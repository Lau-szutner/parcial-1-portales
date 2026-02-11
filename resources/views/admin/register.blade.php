<x-layout>
    <x-slot:title>Register</x-slot:title>
    <main class="container mx-auto grid justify-items-center">
        <h2 class="text-5xl my-10">Registrarse</h2>

        @if ($errors->any())
        <div class="bg-red-500 p-5 text-center text-white">Hubo errores en los datos ingresados</div>
        @endif



        <form action="{{ route('admin.auth') }}" class="grid bg-[var(--primary-color)] p-10 rounded-lg w-6/12 gap-8">
            @csrf
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

            <div class="grid gap-2">
                <button type="submit" class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg text-white">Enviar</button>
                <a href="{{ route('login') }}" class="p-2 h-10 w-30 bg-[var(--secondary-color)] rounded-lg text-center text-white">Iniciar sesion</a>
            </div>

        </form>
    </main>
</x-layout>