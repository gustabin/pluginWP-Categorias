<?php
// Función para crear una nueva categoría
function create_categoria()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre'])) {
    try {
      $categoria_info = array(
        "Nombre"  => sanitize_text_field($_REQUEST['nombre']) // Sanitización
      );

      $obj_categoria = new Categoria;
      $result = $obj_categoria->save($categoria_info); // Guardar la categoría

      if ($result) {
        $response = array(
          'success' => true,
          'message' => 'Categoría guardada exitosamente',
          'data'    => $result
        );
      } else {
        throw new Exception('Error al guardar la categoría');
      }
    } catch (Exception $e) {
      $response = array(
        'success' => false,
        'message' => $e->getMessage()
      );
    }

    wp_send_json($response);
  } else {
    $response = array(
      'success' => false,
      'message' => 'El nombre de la categoría es obligatorio o método no permitido'
    );
    wp_send_json($response);
  }
}
add_action('wp_ajax_create-categoria', 'create_categoria');
// Si necesitas que usuarios no autenticados puedan crear categorías:
// add_action('wp_ajax_nopriv_create-categoria', 'create_categoria');


// Función para mostrar todas las categorías
function show_todas_las_categorias()
{
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
      $obj_categoria = new Categoria;
      $response = $obj_categoria->index(); // Obtener todas las categorías

      wp_send_json([
        'success' => true,
        'data' => $response
      ]);
    } catch (Exception $e) {
      wp_send_json([
        'success' => false,
        'message' => 'Error al obtener categorías: ' . $e->getMessage()
      ]);
    }
  } else {
    wp_send_json([
      'success' => false,
      'message' => 'Método no permitido'
    ]);
  }
}
add_action('wp_ajax_show-todas-las-categorias', 'show_todas_las_categorias');
// add_action('wp_ajax_nopriv_show-todas-las-categorias', 'show_todas_las_categorias');


// Función para mostrar una categoría específica
function show_categoria()
{
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['id'])) {
    try {
      $obj_categoria = new Categoria;
      $response = $obj_categoria->show(intval($_REQUEST['id'])); // Asegurarse de que el ID sea un número entero

      wp_send_json([
        'success' => true,
        'data' => $response
      ]);
    } catch (Exception $e) {
      wp_send_json([
        'success' => false,
        'message' => 'Error al obtener la categoría: ' . $e->getMessage()
      ]);
    }
  } else {
    wp_send_json([
      'success' => false,
      'message' => 'ID de la categoría es obligatorio o método no permitido'
    ]);
  }
}
add_action('wp_ajax_show-categoria', 'show_categoria');
// add_action('wp_ajax_nopriv_show-categoria', 'show_categoria');


// Función para actualizar una categoría
function update_categoria()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['nombre']) && isset($_REQUEST['id'])) {
    try {
      $categoria_info = array(
        "Nombre" => sanitize_text_field($_REQUEST['nombre'])  // Sanitización
      );

      $obj_categoria = new Categoria;
      $result = $obj_categoria->update($categoria_info, intval($_REQUEST['id']));  // Asegurarse de que el ID sea un número entero

      if ($result) {
        $response = array(
          'success' => true,
          'message' => 'Categoría actualizada correctamente',
          'data'    => $result
        );
      } else {
        throw new Exception('No se pudo actualizar la categoría');
      }
    } catch (Exception $e) {
      $response = array(
        'success' => false,
        'message' => $e->getMessage()
      );
    }

    wp_send_json($response);
  } else {
    wp_send_json([
      'success' => false,
      'message' => 'El nombre y el ID de la categoría son obligatorios o método no permitido'
    ]);
  }
}
add_action('wp_ajax_update-categoria', 'update_categoria');
// add_action('wp_ajax_nopriv_update-categoria', 'update_categoria');


// Función para eliminar una categoría
function destroy_categoria()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['id'])) {
    try {
      $obj_categoria = new Categoria;
      $result = $obj_categoria->destroy(intval($_REQUEST['id'])); // Asegurarse de que el ID sea un número entero

      if ($result) {
        $response = array(
          'success' => true,
          'message' => 'Categoría eliminada exitosamente.',
          'data'    => $result  // Puedes enviar el ID eliminado o cualquier otro dato
        );
      } else {
        throw new Exception('No se pudo eliminar la categoría');
      }
    } catch (Exception $e) {
      $response = array(
        'success' => false,
        'message' => $e->getMessage()
      );
    }

    wp_send_json($response);
  } else {
    wp_send_json([
      'success' => false,
      'message' => 'ID de la categoría es obligatorio o método no permitido'
    ]);
  }
}
add_action('wp_ajax_destroy-categoria', 'destroy_categoria');
// add_action('wp_ajax_nopriv_destroy-categoria', 'destroy_categoria');
