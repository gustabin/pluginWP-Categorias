<?php
function drop_table_categorias()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "categorias";
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}
