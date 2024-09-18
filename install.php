<?php
function created_table_categorias()
{

    global $wpdb;
    $table_name = $wpdb->prefix . "categorias";

    $charset_collate = $wpdb->get_charset_collate();

    // SQL para crear la tabla
    $sql = "CREATE TABLE $table_name(
        CategoriaID INT(11) NOT NULL AUTO_INCREMENT,
        Nombre VARCHAR(100) NOT NULL,
        PRIMARY KEY (CategoriaID)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Verificar si la tabla ya tiene datos
    $count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");

    // Si la tabla está vacía, insertar los datos
    if ($count == 0) {
        $sql_insert = "INSERT INTO $table_name (Nombre) VALUES
            ('Bebidas'),
            ('Snacks'),
            ('Lácteos'),
            ('Carnes'),
            ('Frutas'),
            ('Verduras'),
            ('Panadería'),
            ('Condimentos'),
            ('Cereales'),
            ('Productos de limpieza'),
            ('Dulces'),
            ('Congelados'),
            ('Enlatados'),
            ('Galletas'),
            ('Pastas'),
            ('Salsas'),
            ('Aceites'),
            ('Especias'),
            ('Helados'),
            ('Bebidas energéticas');";

        $wpdb->query($sql_insert);
    }
}
