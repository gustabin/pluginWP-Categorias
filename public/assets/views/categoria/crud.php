<?php

$categoria_obj = new Categoria;
$categorias = $categoria_obj->index();

?>
<?php ob_start(); ?>

<!-- Contenedor principal con margen superior -->
<div class="container mt-5">
  <!-- Fila para centrar el contenido -->
  <div class="row justify-content-center mb-5">
    <!-- Columna para centrar la tabla y el botón -->
    <div class="col-lg-6">
      <!-- Título de la sección -->
      <h1>🧵 Módulo de Categorías</h1>
      <!-- Botón para abrir el modal de creación/edición de categorías -->
      <button id="crearCategoriaBtn" type="button" class="btn btn-primary mb-3" data-toggle="modal"
        data-target="#categoriaModal">
        <i class="fa-solid fa-plus" aria-hidden="true"></i>
        Crear Categoría
      </button>
      <!-- Tabla para mostrar las categorías -->
      <table id="categoriaTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <!-- Encabezados de las columnas de la tabla -->
            <th>ID</th>
            <th>Nombre</th>
            <th class="text-right">Acciones</th>
          </tr>
        </thead>

        <tbody>
          <!-- Cuerpo de la tabla donde se llenarán los datos dinámicamente -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="container mt-5">
  <!-- Modal para crear/editar categorías -->
  <div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- Título del modal -->
          <h5 class="modal-title" id="categoriaModalLabel">⚙ Categoría</h5>
          <!-- Botón para cerrar el modal -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulario dentro del modal -->
          <form id="categoriaForm">
            <!-- <span style="justify-content: center; width: 100%; display: none;" id="barra">
              <img style="width: 100%;" src="../images/barra.gif" alt="Procesando..." />
            </span> -->
            <!-- Campo oculto para el ID de la categoría -->
            <input type="hidden" id="categoria_CategoriaID" name="categoria_CategoriaID">
            <!-- Campo para ingresar el nombre de la categoría -->
            <div class="form-group">
              <label for="categoria_Nombre">Nombre</label>
              <input type="text" class="form-control" id="categoria_Nombre" name="categoria_Nombre" required
                autocomplete="off">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <!-- Botón para cerrar el modal -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa-regular fa-circle-xmark" aria-hidden=true></i> Cerrar</button>
          <!-- Botón para guardar la categoría -->
          <button type="button" class="btn btn-primary" id="guardarCategoria">
            <i class="fa-regular fa-save" aria-hidden=true></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $view_crud_categoria = ob_get_contents(); ?>
<?php ob_end_clean(); ?>