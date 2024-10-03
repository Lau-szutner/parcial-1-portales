<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} :: Clouty</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans">
    <nav>
        <ul class="bg-red-500 text-white p-7 flex gap-5 justify-between">
            <div class="flex items-center">
                <h1 class="text-4xl">Clouty.com</h1>
            </div>
            <div class="flex gap-5 items-center">
                <li>
                    <x-nav-link route="home">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="cursos">Cursos</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="articulos">Articulos</x-nav-link>
                </li>
            </div>

            <div>
                <ul class="flex gap-5">
                    <li class="bg-red-700 py-2 px-6 rounded-xl">
                        Login
                    </li>
                    <li class="bg-red-700 py-2 px-6 rounded-xl">admin</li>
                </ul>
            </div>
    </nav>

    {{ $slot }}

</body>

</html>
