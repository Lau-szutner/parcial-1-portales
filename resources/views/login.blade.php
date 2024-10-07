<x-layout>
    <x-slot:title>Login</x-slot:title>
    <main class="container mx-auto grid justify-items-center">
        <h1 class="text-5xl my-10">Login</h1>
        <form action="" class="grid bg-[var(--primary-color)] p-10 rounded-lg w-6/12 gap-8">

            <label for="name" class="text-2xl text-white">Name</label>
            <input type="text" name="name" id="name" class="h-10 w-50 p-5 rounded-lg"
                placeholder="Ingrese su nombre de usuario">

            <label for="password" class="text-2xl text-white">Contraseña</label>
            <input type="text" name="password" id="password" class="h-10 w-50 p-5 rounded-lg"
                placeholder="Ingrese su contraseña">

            <button type="submit" class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg">Iniciar</button>

            <x-nav-link route="dashboard">admin</x-nav-link>
        </form>
    </main>
</x-layout>
