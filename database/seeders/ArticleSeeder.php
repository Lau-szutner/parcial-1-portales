<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // DB::table('articles')->truncate();

        DB::table('articles')->insert([
            [
                'title' => '¿Cuál es el mejor IDE para codear?',
                'img' => 'images/ide-mejor.webp',
                'category' => 'Desarrollo',
                'body' => '    La productividad de un programador, y suele depender de las preferencias individuales y el tipo de desarrollo que se
    realice. Visual Studio Code es uno de los editores más destacados, gracias a su flexibilidad, extensiones abundantes
    y rendimiento. Es una excelente opción para quienes trabajan con múltiples lenguajes. Por otro lado, IntelliJ IDEA
    es ideal para desarrolladores de Java, ofreciendo herramientas avanzadas que facilitan la escritura de código
    limpio, además de soportar otros lenguajes como Kotlin y Scala. Para quienes se enfocan en Python, PyCharm
    proporciona un entorno optimizado con herramientas de análisis y soporte para frameworks populares como Django y
    Flask. Otros editores, como Sublime Text y Atom, destacan por su ligereza y capacidad de personalización, mientras
    que Eclipse y NetBeans son conocidos por su robustez y conjunto de herramientas, especialmente en el ámbito del
    desarrollo en Java y PHP.


    Al elegir un IDE, es importante considerar las preferencias personales, el tipo de proyecto y las herramientas
    necesarias para el desarrollo. Algunos programadores prefieren herramientas ligeras que no consumen muchos recursos,
    como Visual Studio Code, mientras que otros pueden optar por entornos más robustos como IntelliJ o PyCharm que
    ofrecen
    funciones avanzadas. Además, la disponibilidad de extensiones y plugins es un aspecto clave; asegúrate de que el IDE
    que
    elijas tenga buen soporte para las herramientas y lenguajes que utilizas. En resumen, la selección del IDE perfecto
    dependerá de tus necesidades específicas y tu estilo de programación, así que considera estas características para
    encontrar el entorno que mejor se adapte a ti.   
',
                'time' => '20 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => '¿Cuál es el mejor IDE para codear?
                El mejor IDE depende de las necesidades del proyecto y del desarrollador. Visual Studio Code es popular por su ligereza y extensibilidad, mientras que JetBrains IntelliJ IDEA destaca en proyectos Java por sus potentes herramientas integradas. Cada IDE ofrece características que se adaptan mejor a ciertos lenguajes o flujos de trabajo.',
            ],
            [
                'title' => '¿Cómo usar Laravel?',
                'img' => 'images/usar-laravel.webp',
                'category' => 'Frameworks',
                'body' => '    La productividad de un programador, y suele depender de las preferencias individuales y el tipo de desarrollo que se
    realice. Visual Studio Code es uno de los editores más destacados, gracias a su flexibilidad, extensiones abundantes
    y rendimiento. Es una excelente opción para quienes trabajan con múltiples lenguajes. Por otro lado, IntelliJ IDEA
    es ideal para desarrolladores de Java, ofreciendo herramientas avanzadas que facilitan la escritura de código
    limpio, además de soportar otros lenguajes como Kotlin y Scala. Para quienes se enfocan en Python, PyCharm
    proporciona un entorno optimizado con herramientas de análisis y soporte para frameworks populares como Django y
    Flask. Otros editores, como Sublime Text y Atom, destacan por su ligereza y capacidad de personalización, mientras
    que Eclipse y NetBeans son conocidos por su robustez y conjunto de herramientas, especialmente en el ámbito del
    desarrollo en Java y PHP.


    Al elegir un IDE, es importante considerar las preferencias personales, el tipo de proyecto y las herramientas
    necesarias para el desarrollo. Algunos programadores prefieren herramientas ligeras que no consumen muchos recursos,
    como Visual Studio Code, mientras que otros pueden optar por entornos más robustos como IntelliJ o PyCharm que
    ofrecen
    funciones avanzadas. Además, la disponibilidad de extensiones y plugins es un aspecto clave; asegúrate de que el IDE
    que
    elijas tenga buen soporte para las herramientas y lenguajes que utilizas. En resumen, la selección del IDE perfecto
    dependerá de tus necesidades específicas y tu estilo de programación, así que considera estas características para
    encontrar el entorno que mejor se adapte a ti.   
',
                'time' => '40 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => 'Laravel es un framework PHP que facilita el desarrollo web. Para usarlo, necesitas instalar Composer y PHP. Con Composer, puedes crear un nuevo proyecto Laravel, que utiliza una estructura MVC y proporciona herramientas como Eloquent para gestionar bases de datos de manera eficiente.',
            ],
            [
                'title' => 'Introducción a Markdown',
                'img' => 'images/introduccion-markdown.webp',
                'category' => 'Guías',
                'body' => '    La productividad de un programador, y suele depender de las preferencias individuales y el tipo de desarrollo que se
    realice. Visual Studio Code es uno de los editores más destacados, gracias a su flexibilidad, extensiones abundantes
    y rendimiento. Es una excelente opción para quienes trabajan con múltiples lenguajes. Por otro lado, IntelliJ IDEA
    es ideal para desarrolladores de Java, ofreciendo herramientas avanzadas que facilitan la escritura de código
    limpio, además de soportar otros lenguajes como Kotlin y Scala. Para quienes se enfocan en Python, PyCharm
    proporciona un entorno optimizado con herramientas de análisis y soporte para frameworks populares como Django y
    Flask. Otros editores, como Sublime Text y Atom, destacan por su ligereza y capacidad de personalización, mientras
    que Eclipse y NetBeans son conocidos por su robustez y conjunto de herramientas, especialmente en el ámbito del
    desarrollo en Java y PHP.


    Al elegir un IDE, es importante considerar las preferencias personales, el tipo de proyecto y las herramientas
    necesarias para el desarrollo. Algunos programadores prefieren herramientas ligeras que no consumen muchos recursos,
    como Visual Studio Code, mientras que otros pueden optar por entornos más robustos como IntelliJ o PyCharm que
    ofrecen
    funciones avanzadas. Además, la disponibilidad de extensiones y plugins es un aspecto clave; asegúrate de que el IDE
    que
    elijas tenga buen soporte para las herramientas y lenguajes que utilizas. En resumen, la selección del IDE perfecto
    dependerá de tus necesidades específicas y tu estilo de programación, así que considera estas características para
    encontrar el entorno que mejor se adapte a ti.   
',
                'time' => '32 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => 'Markdown es un lenguaje de marcado simple usado para formatear texto de forma fácil y legible. Permite crear documentos que pueden convertirse en HTML, usando una sintaxis sencilla para listas, negritas, títulos y enlaces. Es muy utilizado en documentación y plataformas como GitHub.',
            ],
            // Agrega más artículos según sea necesario
        ]);
    }
}
