<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articles')->insert([
            // ID 1 - Desarrollo
            [
                'title' => '¿Cuál es el mejor IDE para codear?',
                'img' => '/articles/ide-mejor.webp',
                'category' => 'Desarrollo',
                'nivel_fk' => 1,
                'body' => "Elegir el entorno de desarrollo integrado (IDE) correcto puede marcar una diferencia abismal en tu productividad diaria. No existe una respuesta única, ya que la elección depende en gran medida del lenguaje que utilices y de tus preferencias personales.\n\nPor un lado, tenemos a Visual Studio Code (VS Code). Ha ganado una popularidad inmensa en los últimos años gracias a que es gratuito, extremadamente ligero y posee un mercado de extensiones casi infinito. Es la opción predilecta para desarrolladores web (JavaScript, React, Vue) y para aquellos que trabajan con múltiples lenguajes a la vez.\n\nEn la otra esquina, se encuentran los productos de JetBrains, como IntelliJ IDEA (para Java) o PyCharm (para Python). Estos no son simples editores de texto; son herramientas pesadas que entienden tu código profundamente. Ofrecen refactorización automática, análisis estático avanzado y herramientas de depuración que VS Code solo puede soñar con alcanzar mediante plugins.\n\nEn conclusión: si buscas velocidad y versatilidad, ve por VS Code. Si necesitas potencia bruta y trabajas en un entorno corporativo con lenguajes tipados, IntelliJ es una inversión que se paga sola.",
                'time' => '20 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Análisis comparativo de los editores de código más populares del mercado actual.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 2 - Frameworks
            [
                'title' => '¿Cómo usar Laravel?',
                'img' => '/articles/usar-laravel.webp',
                'category' => 'Frameworks',
                'nivel_fk' => 2,
                'body' => "Laravel se ha consolidado como el framework de PHP más elegante y robusto del mercado. Su filosofía se basa en hacer feliz al desarrollador, eliminando el código repetitivo y ofreciendo una sintaxis expresiva. Para comenzar, lo primero que necesitas es tener instalado PHP y Composer en tu máquina.\n\nUna de las joyas de la corona de Laravel es Eloquent, su ORM (Object-Relational Mapper). Con Eloquent, interactuar con la base de datos se siente como escribir código orientado a objetos natural. En lugar de escribir complejas consultas SQL, puedes hacer cosas como 'User::find(1)' para recuperar un usuario. Esto no solo acelera el desarrollo, sino que hace que el código sea mucho más legible para otros programadores.\n\nAdemás, Laravel incluye de fábrica sistemas de autenticación, colas de trabajo, notificaciones y un potente motor de plantillas llamado Blade. Si estás buscando crear una aplicación escalable, segura y moderna en 2026, aprender Laravel no es una opción, es una necesidad.",
                'time' => '40 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Guía esencial para dar tus primeros pasos en el framework más popular de PHP.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 3 - Guías
            [
                'title' => 'Introducción a Markdown',
                'img' => '/articles/introduccion-markdown.webp',
                'category' => 'Guías',
                'nivel_fk' => 3,
                'body' => "¿Alguna vez te has preguntado cómo los desarrolladores escriben documentación tan bonita en GitHub sin usar Word? El secreto es Markdown. Es un lenguaje de marcado ligero creado para ser fácil de leer y fácil de escribir. La idea es que el documento sea legible tal cual es, sin parecer lleno de etiquetas y código complejo.\n\nLa sintaxis es increíblemente intuitiva. Usas almohadillas (#) para los títulos, asteriscos (*) para crear listas o poner texto en cursiva, y guiones (-) para listas desordenadas. No necesitas abrir y cerrar etiquetas como en HTML. Por ejemplo, para poner algo en negrita simplemente lo encierras en doble asterisco.\n\nDominar Markdown es esencial para cualquier perfil técnico. Lo usarás para escribir el archivo README.md de tus repositorios, para documentar tus APIs, para escribir en foros como Stack Overflow e incluso para tomar notas personales en aplicaciones como Obsidian o Notion.",
                'time' => '32 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Aprende a documentar tus proyectos como un profesional usando la sintaxis Markdown.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 4 - Bases de Datos
            [
                'title' => 'SQL vs NoSQL: ¿Qué elegir?',
                'img' => '/articles/sql-nosql.png',
                'category' => 'Bases de Datos',
                'nivel_fk' => 2,
                'body' => "La eterna discusión en el diseño de sistemas: ¿Base de datos Relacional (SQL) o No Relacional (NoSQL)? La respuesta corta es: depende de tus datos. Las bases de datos SQL, como MySQL o PostgreSQL, son estrictas. Se basan en tablas y relaciones predefinidas. Son ideales cuando la integridad de los datos es crítica, como en sistemas financieros o inventarios.\n\nPor otro lado, las bases de datos NoSQL, como MongoDB o Cassandra, ofrecen flexibilidad. No requieren un esquema fijo, lo que significa que puedes guardar documentos JSON con diferentes estructuras en la misma colección. Son perfectas para Big Data, sistemas de logs en tiempo real o aplicaciones donde los requerimientos cambian muy rápido.\n\nEl error más común es elegir NoSQL solo por 'moda'. Si tus datos tienen relaciones claras (usuarios tienen pedidos, pedidos tienen facturas), SQL sigue siendo el rey. Si necesitas escalar horizontalmente de forma masiva y tus datos son desestructurados, NoSQL es tu aliado.",
                'time' => '25 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Comparamos los dos grandes paradigmas de almacenamiento de datos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 5 - Ciberseguridad
            [
                'title' => 'Top 5 Vulnerabilidades OWASP',
                'img' => '/articles/seguridad-web.webp',
                'category' => 'Seguridad',
                'nivel_fk' => 3,
                'body' => "La seguridad web no es algo que se añade al final del proyecto; debe ser parte del diseño. El proyecto OWASP (Open Web Application Security Project) publica regularmente las vulnerabilidades más críticas. Ignorarlas es dejar la puerta abierta a los hackers.\n\n1. Broken Access Control: Es la falla número uno. Ocurre cuando un usuario puede actuar como administrador simplemente cambiando una URL.\n2. Fallas Criptográficas: Guardar contraseñas en texto plano o usar algoritmos obsoletos.\n3. Inyección (SQL Injection): Cuando un atacante puede enviar comandos de base de datos a través de un formulario de entrada.\n\nPara mitigar estos riesgos, nunca confíes en el input del usuario. Valida todo en el backend, usa declaraciones preparadas para tus consultas SQL y asegúrate de mantener tus librerías actualizadas. La seguridad es una carrera constante contra los atacantes.",
                'time' => '45 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Protege tus aplicaciones conociendo los vectores de ataque más comunes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 6 - Móvil
            [
                'title' => 'El futuro de Flutter',
                'img' => '/articles/flutter-future.jpg',
                'category' => 'Mobile',
                'nivel_fk' => 1,
                'body' => "Google dio un golpe sobre la mesa con Flutter. A diferencia de otras opciones híbridas que usan 'WebViews' lentas, Flutter compila a código nativo ARM tanto para iOS como para Android. Esto permite animaciones fluidas a 60 (o 120) cuadros por segundo.\n\nPero el futuro de Flutter va más allá del móvil. Con la llegada de Flutter Web y Flutter Desktop, la promesa de 'escríbelo una vez, ejecútalo en cualquier lugar' está más cerca que nunca. Imagina crear una app de gestión que funcione en un iPad, en un teléfono Android, en un navegador Chrome y como aplicación nativa de Windows, todo compartiendo el 95% del código base.\n\nLa comunidad está creciendo exponencialmente y grandes empresas como BMW, Alibaba y Toyota ya lo están adoptando. Si estás pensando en aprender desarrollo móvil hoy, apostar por Flutter y el lenguaje Dart es una jugada segura.",
                'time' => '15 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => '¿Por qué Google está apostando todo al desarrollo multiplataforma?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 7 - Arquitectura
            [
                'title' => 'Microservicios: ¿Vale la pena?',
                'img' => '/articles/microservicios.webp',
                'category' => 'Arquitectura',
                'nivel_fk' => 3,
                'body' => "La arquitectura de microservicios está de moda. La idea es seductora: dividir una aplicación gigante en pequeños servicios independientes que se comunican entre sí. Si el servicio de 'pagos' se cae, el resto de la web sigue funcionando. Además, cada equipo puede elegir su propia tecnología; un servicio en Node.js y otro en Python.\n\nSin embargo, no todo es color de rosa. Los microservicios introducen una complejidad operativa brutal. Ahora tienes que gestionar redes, latencia, transacciones distribuidas y logs descentralizados. Lo que antes era una simple llamada a una función dentro del mismo código, ahora es una petición HTTP que puede fallar.\n\n¿La conclusión? No empieces con microservicios. Comienza con un monolito bien modularizado. Solo cuando tu equipo sea demasiado grande o tus necesidades de escalado sean extremas, considera romper ese monolito en servicios. De lo contrario, estarás construyendo una 'infraestructura distribuida del infierno'.",
                'time' => '50 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Analizamos el costo-beneficio de las arquitecturas distribuidas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 8 - Backend
            [
                'title' => 'Dominando las APIs REST',
                'img' => '/articles/api-rest.webp',
                'category' => 'Backend',
                'nivel_fk' => 2,
                'body' => "Las APIs (Application Programming Interfaces) son el pegamento de internet. REST (Representational State Transfer) es el estilo arquitectónico más común para construirlas. Pero, ¿qué hace que una API sea realmente 'RESTful'?\n\nPrimero, el uso correcto de los verbos HTTP. GET es solo para pedir datos, nunca para modificarlos. POST es para crear, PUT/PATCH para editar y DELETE para borrar. Segundo, el uso de códigos de estado. No devuelvas siempre un '200 OK' si hubo un error; usa '404' si no se encontró el recurso o '400' si los datos enviados están mal.\n\nUna buena API debe ser predecible. Si la ruta para obtener usuarios es '/users', la ruta para obtener el usuario número 5 debería ser '/users/5'. Diseñar una buena API es un arte que requiere empatía: debes pensar en el desarrollador que consumirá tu servicio y hacerle la vida lo más fácil posible.",
                'time' => '30 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Mejores prácticas para diseñar servicios web que otros desarrolladores amen usar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ID 9 - Algoritmos
            [
                'title' => 'Big O Notation simplificado',
                'img' => '/articles/big-o.webp',
                'category' => 'Algoritmos',
                'nivel_fk' => 2,
                'body' => "Cuando aprendes a programar, te preocupas porque el código funcione. Cuando te vuelves un profesional, te preocupas porque el código escale. Aquí entra la notación Big O.\n\nBig O mide cómo aumenta el tiempo de ejecución de tu algoritmo a medida que crecen los datos de entrada. Imagina que tienes que buscar un nombre en una guía telefónica.\n\n- O(n) o Lineal: Lees nombre por nombre desde el principio. Si la guía tiene 1000 nombres, tardas 1000 pasos. Si tiene un millón, tardas un millón.\n- O(log n) o Logarítmica: Abres la guía por la mitad. Si el nombre está antes, descartas la mitad derecha. Repites el proceso. Esto es infinitamente más rápido para grandes volúmenes de datos.\n\nEntender esto es vital para optimizar bases de datos y escribir bucles eficientes. Evita a toda costa los O(n^2), que suelen ser bucles anidados, porque pueden tumbar tu servidor con un poco de carga extra.",
                'time' => '22 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'excerpt' => 'Aprende a medir la eficiencia de tu código de forma científica.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
