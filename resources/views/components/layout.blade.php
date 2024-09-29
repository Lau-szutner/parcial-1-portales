<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} :: Clouty</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav>
        <ul class="bg-red-500 text-white p-7 flex gap-5 justify-between">
            <div>
                <h1>Clouty.com</h1>
            </div>
            <div class="flex gap-5">
                <li>
                    <x-nav-link route="home">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="cursos">Cursos</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="blog">Blog</x-nav-link>
                </li>
            </div>

            <div>
                <ul>
                    <li>
                        Login
                    </li>
                </ul>
            </div>
    </nav>

    {{ $slot }}

</body>

</html>
