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
                'body' => 'La productividad de un programador, y suele depender de las preferencias individuales y el tipo de desarrollo que se
    realice. Visual Studio Code es uno de los editores más destacados, gracias a su flexibilidad, extensiones abundantes
    y rendimiento. Es una excelente opción para quienes trabajan con múltiples lenguajes. Por otro lado, IntelliJ IDEA
    es ideal para desarrolladores de Java, ofreciendo herramientas avanzadas que facilitan la escritura de código
    limpio, además de soportar otros lenguajes como Kotlin y Scala. Para quienes se enfocan en Python, PyCharm
    proporciona un entorno optimizado con herramientas de análisis y soporte para frameworks populares como Django y
    Flask. Otros editores, como Sublime Text y Atom, destacan por su ligereza y capacidad de personalización, mientras
    que Eclipse y NetBeans son conocidos por su robustez y conjunto de herramientas, especialmente en el ámbito del
    desarrollo en Java y PHP.',
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
                'body' => 'Laravel se destaca por su elegante sintaxis y su arquitectura MVC, lo que facilita la creación de proyectos escalables y mantenibles. Existen numerosos cursos en línea que abarcan desde conceptos básicos hasta técnicas avanzadas, adaptándose a diferentes niveles de experiencia. Algunos cursos enfatizan la creación de APIs RESTful, mientras que otros se centran en la implementación de funciones específicas como autenticación, manejo de bases de datos y optimización de rendimiento. Es esencial considerar tus objetivos de aprendizaje y el estilo de enseñanza que prefieres al elegir un curso. Además, la disponibilidad de recursos adicionales, como documentación, foros de soporte y proyectos prácticos, puede mejorar significativamente tu experiencia de aprendizaje. En resumen, al seleccionar un curso de Laravel, asegúrate de que se alinee con tus necesidades y expectativas para aprovechar al máximo esta potente herramienta en el desarrollo web.
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
                'body' => 'La elección de un artículo sobre Markdown puede ser clave para mejorar tus habilidades en la creación de contenido y documentación. Markdown es un lenguaje de marcado ligero que permite formatear texto de manera sencilla y eficiente, siendo ampliamente utilizado en plataformas como GitHub, foros y blogs. Los artículos sobre Markdown suelen abordar desde los conceptos básicos, como la sintaxis para encabezados, listas y enlaces, hasta técnicas avanzadas, como la inclusión de imágenes y tablas. Al seleccionar un artículo, es importante considerar tu nivel de experiencia y el propósito de tu aprendizaje. Algunos artículos se centran en la integración de Markdown con herramientas de desarrollo, mientras que otros pueden explorar su uso en la escritura técnica y la creación de documentación. Además, la disponibilidad de ejemplos prácticos y ejercicios puede enriquecer tu comprensión y aplicación de Markdown. En resumen, al elegir un artículo sobre Markdown, busca aquel que se adapte a tus necesidades y te permita sacar el máximo provecho de este versátil lenguaje de marcado.
',
                'time' => '32 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => 'Markdown es un lenguaje de marcado simple usado para formatear texto de forma fácil y legible. Permite crear documentos que pueden convertirse en HTML, usando una sintaxis sencilla para listas, negritas, títulos y enlaces. Es muy utilizado en documentación y plataformas como GitHub.',
            ],

        ]);
    }
}
