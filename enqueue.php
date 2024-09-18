<?php
/*
* AGREGA NUESTRO CSS
*/
if (!function_exists('crud_categorias_enqueue_css')) {
    function crud_categorias_enqueue_css()
    {
        wp_register_style(
            'crud-categorias',
            plugin_dir_url(__FILE__) . 'public/assets/css/style.css',
            null,
            '1.0',
            'all'
        );
        wp_register_style(
            'bootstrap',
            "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css",
            array(),
            '4.5.2',
            'all'
        );
        wp_register_style(
            'datatable',
            "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css",
            array('bootstrap'),
            '1.11.3',
            'all'
        );
        wp_register_style(
            'font-awesome',
            "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css",
            array('bootstrap'),
            '6.0.0',
            'all'
        );
        wp_enqueue_style('crud-categorias');
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('datatable');
        wp_enqueue_style('font-awesome');
    }
}

add_action('wp_enqueue_scripts', 'crud_categorias_enqueue_css');

/*
* AGREGA NUESTRO JS
*/
if (!function_exists('crud_categorias_enqueue_scripts')) {
    function crud_categorias_enqueue_scripts()
    {
        wp_register_script(
            'jquery',
            "https://code.jquery.com/jquery-3.6.0.min.js",
            array('jquery'),
            '3.6.0',
            true
        );
        wp_enqueue_script('jquery');

        wp_register_script(
            'swal-js',
            "https://cdn.jsdelivr.net/npm/sweetalert2@11",
            array('jquery'),
            '11.0',
            true
        );
        wp_enqueue_script('swal-js');

        wp_register_script(
            'datatable-js',
            "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
            array('jquery'),
            '1.11.3',
            true
        );
        wp_enqueue_script('datatable-js');

        wp_register_script(
            'bootstrap-js',
            "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js",
            array('jquery'),
            '4.5.2',
            true
        );
        wp_enqueue_script('bootstrap-js');

        wp_register_script(
            'crud-categorias-javascript',
            plugin_dir_url(__FILE__) . 'public/assets/js/main.js',
            array('jquery'),
            '1.0',
            true
        );
        wp_enqueue_script('crud-categorias-javascript');

        wp_localize_script('crud-categorias-javascript', 'ajax_var', array(
            'url' => admin_url('admin-ajax.php'),
        ));
    }
}

add_action('wp_enqueue_scripts', 'crud_categorias_enqueue_scripts');
