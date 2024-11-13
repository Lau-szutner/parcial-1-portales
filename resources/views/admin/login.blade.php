<x-layout>
    <x-slot:title>Login</x-slot:title>
    <main class="container mx-auto grid justify-items-center">
        <h1 class="text-5xl my-10">Login</h1>

        @if ($errors->any())
            <div class="bg-red-500 p-5 text-center text-white">Hubo errores en los datos ingresados</div>
        @endif

        <form action="{{ route('admin.auth') }}" class="grid bg-[var(--primary-color)] p-10 rounded-lg w-6/12 gap-8">
            @csrf
            <div class="flex flex-col">
                <label for="email" class="text-2xl text-white">Email</label>
                <input type="email" name="email" id="email" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su nombre de usuario" value="{{ old('email') }}">
                @error('email')
                    <!-- Estilo para el mensaje de error en rojo -->
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-2xl text-white">Contraseña</label>
                <input type="password" name="password" id="password" class="h-10 w-50 p-5 rounded-lg"
                    placeholder="Ingrese su contraseña">
                @error('password')
                    <!-- Estilo para el mensaje de error en rojo -->
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg text-white">Iniciar</button>
        </form>
    </main>
</x-layout>
