!- Errores de ortografía (ej: tildes).

## Terminadas

- [cursos] No indican el precio.
- Hay errores de validación sin traducir.
    - todo lo no autenticado esta validado
- [responsive] No es responsive.
    - Revisa autenticado
- Problemas de jerarquías con los h\*. En la
  home, los títulos de las noticias deberían ser h3,
  ya que dependen del h2 previo "Los mejores articulos de la web".
- El html tiene el "lang" para inglés, no español.
- Hay pantallas con dos o más h1, en vez de
  solo uno. Si bien técnicamente está permitido en
  HTML5 bajo ciertas circunstancias, muchos
  lectores de pantalla no soportan eso, lo que trae
  problemas para accesibilidad y usuarios no
  videntes.
- Hay imágenes que no tienen un alt
  descriptivo, como la imagen de la home.

## Sin hacer

- [usuarios-admin] Falta cuánto se pagó por cada
  curso.
- [noticias] El botón de "Publicar" debería estar al
  comienzo, no al final.
- [noticias] Algunos textos están en español y otros
  en inglés.
- [noticias-form] Hay <label>s que no tienen la
  mayúscula en la primera letra.
- [noticias-form] La imagen está marcada como
  campo obligatorio en el código, pero no se
  muestra un mensaje de error si no se pone. Solo
  tira el error general de que algo salió mal.
- [noticias-form] La imagen no acepta formatos
  modernos de imagen, como webp o avif.
- [noticias-form] No se muestra el mensaje de
  error para el campo "body".
- [noticias-editar] Hay datos que no se pueden
  editar (como "Tópicos"), y algunos campos tienen
  diferentes controles de form (textarea vs input, por
  ejemplo).
- [noticias-editar] Los campos de "Tiempo de
  lectura" y "Autor" son cargados con el mismo
  valor de "Categoria".
- [noticias-editar] Obliga a poner una nueva
  imagen. Debería permitir editar dejando la imagen
  actual.
- [noticias-editar] No guarda la imagen nueva,
  solo elimina la anterior.
- [noticias-editar] No funciona. Requiere valores
  para los tópicos, pero ese campo no está en el form
  de edición.
- [noticias] El autor de la entrada debería ser el
  usuario autenticado.
- Falta el regsitro de usuarios.
- Upload de imágenes.
- Hay errores de validación de HTML.
- Hay campos de formularios que no tienen un
  label (o atributo aria-\* equivalente)
  debidamente asociado. El placeholder no es un
  reemplazo semántico. Por ejemplo, "Imagen" en [noticias-form].
