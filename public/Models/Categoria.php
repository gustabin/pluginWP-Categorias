<?php
class Categoria
{
    public function index()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "categorias";

        // Obtener los resultados de la consulta
        $response = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

        // Recorrer los resultados para agregar el campo 'Acciones'
        foreach ($response as &$row) {
            $row['Acciones'] =
                '<div class="text-right">
                <button class="btn btn-warning edit-btn" data-id="' . esc_html($row['CategoriaID']) . '">
                    <i class="fas fa-pencil" aria-hidden="true"></i> Editar
                </button>
                &nbsp;
                <button class="btn btn-danger delete-btn" data-id="' . esc_html($row['CategoriaID']) . '">
                    <i class="fas fa-trash" aria-hidden="true"></i> Eliminar
                </button>
                </div>';
        }
        // Devolver los resultados modificados
        return $response;
    }

    public function save($categoria_info)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'categorias'; // Nombre de la tabla
        // Formato de los valores (para ayudar a proteger contra inyecciones SQL)
        $formats = array('%s'); // El campo 'nombre' es una cadena (string)

        // Insertar la nueva fila
        $result = $wpdb->insert($table_name, $categoria_info, $formats);

        // Obtener el ID del nuevo registro insertado
        $new_id = $wpdb->insert_id;

        if ($result && $new_id) {
            // Éxito, se insertó una nueva fila
            return $new_id;
        } else {
            // Error, no se pudo insertar la fila
            return new WP_Error('db_insert_error', 'Error al guardar la categoría', $wpdb->last_error);
        }
    }

    public function update($categoria_info, $id)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'categorias';

        // Validar que $id sea un entero
        $id = intval($id);

        // Condiciones para identificar la fila a actualizar
        $where = array('CategoriaID' => $id);

        // Formatos para los datos y condiciones
        $format = array('%s');
        $where_format = array('%d');

        // Ejecutar la actualización
        $result = $wpdb->update($table_name, $categoria_info, $where, $format, $where_format);

        if ($result !== false) {
            // Devolver el número de filas afectadas
            return $wpdb->rows_affected;
        } else {
            return new WP_Error('db_update_error', 'Error al actualizar la categoría', $wpdb->last_error);
        }
    }

    public function show($id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "categorias";

        // Asegurar que el ID sea un número entero
        $id = intval($id);

        // Preparar y ejecutar la consulta de manera segura
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE CategoriaID = %d", $id);
        $response = $wpdb->get_row($query, OBJECT);

        if ($response) {
            return $response;
        } else {
            return new WP_Error('db_show_error', 'Error al obtener la categoría', $wpdb->last_error);
        }
    }

    public function destroy($id)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'categorias';

        // Asegurarse de que el ID sea un número entero
        $id = intval($id);

        // Condiciones para eliminar la fila
        $where = array('CategoriaID' => $id);

        // Formato del valor en $where
        $where_format = array('%d');  // 'CategoriaID' es un entero

        // Ejecutar la eliminación
        $result = $wpdb->delete($table_name, $where, $where_format);

        if ($result) {
            return $id; // Retornar el ID de la fila eliminada
        } else {
            return new WP_Error('db_delete_error', 'Error al eliminar la categoría', $wpdb->last_error);
        }
    }
}
