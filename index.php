<?php

/**
 * Plugin Name: CRUD de tabla categorías usando la clase WPDB
 * Plugin URI: https://stackcodelab.com/donaciones.php
 * Description: Este plugin permite gestionar categorías dinámicamente en tu sitio WordPress usando la clase WPDB. Proporciona una interfaz de administración simple y eficaz para crear, leer, actualizar y eliminar categorías sin recargar la página. [categoria_crud_shortcode]
 * Version: 1.0.0
 * Author: StackCodeLab
 * Author URI: https://stackcodelab.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: crud-categorias
 */

// Incluir archivos necesarios
require plugin_dir_path(__FILE__) . "install.php";
require plugin_dir_path(__FILE__) . "uninstall.php";
require plugin_dir_path(__FILE__) . "enqueue.php";
require plugin_dir_path(__FILE__) . "public/Controllers/CategoriaController.php";
require plugin_dir_path(__FILE__) . "public/Models/Categoria.php";

// Hooks para activación y desactivación del plugin
register_activation_hook(__FILE__, 'created_table_categorias');
register_deactivation_hook(__FILE__, 'drop_table_categorias');

// Función del shortcode
function function_shortcode()
{
    require plugin_dir_path(__FILE__) . "/public/assets/views/categoria/crud.php";
    return $view_crud_categoria;
}

// Registrar shortcode
add_shortcode('categoria_crud_shortcode', 'function_shortcode');
