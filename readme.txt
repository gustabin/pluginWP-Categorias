=== Nombre del Plugin ===
Contributors: stackcodelab
Donate link: https://stackcodelab.com/donaciones.php
Tags: Sistema CRUD, CRUD Básico, CRUD con buenas practicas
Requires at least: 5.0
Tested up to: 6.0
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Este plugin permite gestionar categorías dinámicamente dentro de un sitio web de WordPress. 
Proporciona una interfaz de administración simple y eficaz que permite crear, editar, y eliminar categorías 
de forma ágil utilizando AJAX y jQuery.

Con este plugin, los administradores del sitio pueden gestionar fácilmente categorías a través de un CRUD 
(Crear, Leer, Actualizar, Eliminar) completamente funcional. La funcionalidad incluye:

- Visualización de una tabla de categorías con paginación y búsquedas.
- Creación y edición de categorías mediante un modal intuitivo.
- Eliminación segura de categorías con confirmación.
- Interfaz dinámica basada en AJAX para evitar recargas de página y mejorar la experiencia del usuario.
- Notificaciones interactivas de errores y éxitos mediante SweetAlert.

Este plugin es ideal para aquellos que necesiten una administración simple de categorías dentro de su 
sitio WordPress sin la necesidad de recargar la página constantemente.


== Installation ==
Proceso de Instalación:

1. **Descargar el plugin**: 
   - Descarga el archivo .zip de tu plugin desde tu computadora o desde la ubicación donde esté alojado.

2. **Subir el plugin a WordPress**:
   - Ve al panel de administración de tu sitio WordPress.
   - En el menú lateral, selecciona la opción "Plugins" y luego haz clic en "Añadir nuevo".
   - En la parte superior de la página, haz clic en el botón "Subir plugin".
   - Selecciona el archivo .zip que descargaste y haz clic en "Instalar ahora".

3. **Activar el plugin**:
   - Una vez instalado, haz clic en el botón "Activar" para poner en marcha el plugin.

4. **Incorporar el shortcode**:
   - Para utilizar el CRUD de categorías en una página o entrada, añade el siguiente shortcode donde desees 
   que aparezca: [categoria_crud_shortcode].
   - Este shortcode insertará la funcionalidad del CRUD de categorías directamente en la interfaz del sitio, 
   permitiendo la gestión de categorías sin necesidad de acceder al panel de administración.

5. **Configurar el plugin**:
   - El plugin ya estará listo para su uso. Podrás acceder a la administración de categorías desde la página 
   o entrada donde hayas colocado el shortcode.

6. **Comenzar a gestionar las categorías**:
   - Utiliza la funcionalidad de CRUD para crear, editar y eliminar categorías de forma dinámica y rápida, 
   sin recargar la página, directamente desde el frontend.


== Changelog ==
= 1.0.0 =
Descripción de los Cambios Iniciales:

Versión inicial del plugin que permite la gestión completa de categorías a través de un CRUD 
(Crear, Leer, Actualizar y Eliminar) dinámico en el frontend de WordPress. Las características principales 
incluyen:

1. **Shortcode para integración sencilla**: Se ha agregado el shortcode [categoria_crud_shortcode], 
el cual permite insertar el sistema de administración de categorías en cualquier página o entrada.

2. **Interfaz interactiva con AJAX**: Implementación de un CRUD completamente funcional que utiliza 
AJAX para operaciones asincrónicas, lo que permite la gestión de categorías sin recargar la página, 
mejorando la experiencia del usuario.

3. **Gestión de categorías**: Los usuarios pueden crear nuevas categorías, editarlas, y eliminarlas de 
manera rápida y eficiente.

4. **Notificaciones en tiempo real**: Se han integrado notificaciones con SweetAlert para informar al 
usuario sobre el éxito o errores en las operaciones realizadas (como la creación o eliminación de categorías).

5. **Compatibilidad con DataTables**: La visualización de las categorías en una tabla interactiva 
permite búsquedas, ordenamiento y paginación para facilitar la gestión de grandes volúmenes de datos.

6. **Validación de formularios**: Se han agregado validaciones para evitar que se envíen formularios 
incompletos o erróneos.

7. **Diseño intuitivo**: El plugin presenta una interfaz limpia y fácil de usar que se integra perfectamente 
con cualquier tema de WordPress.