<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} :: Clouty</title>

    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[var(--accent-color)]">
    <nav>
        <ul class="bg-[var(--primary-color)] text-white p-7 flex gap-5 justify-between">
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
            <div class="py-2 px-12 bg-[var(--secondary-color)] rounded-lg">
                <x-nav-link route="login">Login</x-nav-link>
            </div>
        </ul>
    </nav>

    {{ $slot }}

</body>

</html>
