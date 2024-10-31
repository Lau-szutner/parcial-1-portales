<x-layout>
    <x-slot:title>Login</x-slot:title>
    <main class="container mx-auto grid justify-items-center">
        <h1 class="text-5xl my-10">Login</h1>

        <form action="{{ route('admin.auth') }}" class="grid bg-[var(--primary-color)] p-10 rounded-lg w-6/12 gap-8">

            <label for="email" class="text-2xl text-white">Email</label>
            <input type="email" name="email" id="email" class="h-10 w-50 p-5 rounded-lg"
                placeholder="Ingrese su nombre de usuario">

            <label for="password" class="text-2xl text-white">Contraseña</label>
            <input type="text" name="password" id="password" class="h-10 w-50 p-5 rounded-lg"
                placeholder="Ingrese su contraseña">

            <button type="submit" class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg">Iniciar</button>
        </form>
    </main>
</x-layout>
