# Nombre del Plugin

**Contributors**: [stackcodelab](https://stackcodelab.com)  
**Donate link**: [Donaciones](https://stackcodelab.com/donaciones.php)  
**Tags**: Sistema CRUD, CRUD Básico, CRUD con buenas prácticas  
**Requires at least**: WordPress 5.0  
**Tested up to**: WordPress 6.0  
**Stable tag**: trunk  
**Requires PHP**: 7.0  
**License**: GPLv2 or later  
**License URI**: [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)

## Descripción

Este plugin permite gestionar categorías dinámicamente dentro de un sitio web de WordPress. Proporciona una interfaz de administración simple y eficaz que permite crear, editar, y eliminar categorías de forma ágil utilizando **AJAX** y **jQuery**.

### Funcionalidades principales:
- Visualización de una tabla de categorías con paginación y búsqueda.
- Creación y edición de categorías mediante un modal intuitivo.
- Eliminación segura de categorías con confirmación.
- Interfaz dinámica basada en AJAX, mejorando la experiencia del usuario.
- Notificaciones interactivas mediante **SweetAlert**.

Este plugin es ideal para administradores que buscan gestionar categorías sin la necesidad de recargar constantemente la página.

## Instalación

### Proceso de Instalación:

1. **Descargar el plugin**: 
   - Descarga el archivo `.zip` del plugin desde GitHub o la fuente de descarga que prefieras.

2. **Subir el plugin a WordPress**:
   - En el panel de administración de WordPress, ve a `Plugins > Añadir nuevo`.
   - Haz clic en "Subir plugin" y selecciona el archivo `.zip` descargado.
   - Haz clic en "Instalar ahora".

3. **Activar el plugin**:
   - Una vez instalado, activa el plugin.

4. **Incorporar el shortcode**:
   - Añade el siguiente shortcode en la página o entrada donde desees que aparezca el CRUD: `[categoria_crud_shortcode]`.

5. **Configurar el plugin**:
   - El plugin ya estará listo para su uso. Accede a la administración de categorías desde el frontend.

## Uso del Plugin

- Usa el shortcode `[categoria_crud_shortcode]` para insertar el sistema CRUD en cualquier página o entrada.
- Gestiona tus categorías de manera dinámica sin recargar la página.
- Las notificaciones de éxito o error aparecerán en tiempo real gracias a **SweetAlert**.

## Requisitos

- **WordPress**: 5.0 o superior
- **PHP**: 7.0 o superior

## Changelog

### 1.0.0
- **Versión inicial**: Gestión completa de categorías con un CRUD dinámico en el frontend de WordPress.
- **Shortcode**: Se añade el shortcode `[categoria_crud_shortcode]` para facilitar la integración del sistema CRUD.
- **Interfaz AJAX**: Operaciones asincrónicas con AJAX para una mejor experiencia de usuario.
- **Notificaciones interactivas**: Notificaciones de éxito y errores mediante **SweetAlert**.
- **Compatibilidad con DataTables**: Tabla interactiva con búsqueda, ordenamiento y paginación.
- **Validación de formularios**: Validaciones para asegurar entradas correctas.
- **Diseño intuitivo**: Interfaz fácil de usar e integrada con cualquier tema de WordPress.

## Licencia

Este plugin está licenciado bajo la licencia GPLv2 o posterior. Puedes ver más detalles en [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html).

