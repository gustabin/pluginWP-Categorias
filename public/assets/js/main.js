jQuery(document).ready(function () {
    const ajaxUrl = ajax_var.url; // Definir URL de AJAX en una variable global

    // Cargar categorías al iniciar
    loadCategorias();

    // Limpiar el formulario al abrir el modal
    function limpiarFormulario() {
        jQuery('#categoriaForm')[0].reset(); // Limpiar todos los campos del formulario
        jQuery('#categoria_ID').val(''); // Limpiar el ID de la categoría
    }

    // Mostrar el modal de creación y limpiar formulario
    jQuery('#crearCategoriaBtn').click(function () {
        limpiarFormulario();
        jQuery('#categoriaModal').modal('show'); // Mostrar el modal
    });

    // Cargar categorías en la tabla
    function loadCategorias() {
        jQuery.ajax({
            url: ajaxUrl,
            type: "GET",
            dataType: 'json',
            data: { action: 'show-todas-las-categorias' },
            success: function (response) {
                // Destruir DataTable si ya está inicializada
                if (jQuery.fn.DataTable.isDataTable('#categoriaTable')) {
                    jQuery('#categoriaTable').DataTable().clear().destroy();
                }

                // Inicializar DataTable con nuevos datos
                jQuery('#categoriaTable').DataTable({
                    data: response.data,
                    columns: [
                        { data: 'CategoriaID' },
                        { data: 'Nombre' },
                        { data: 'Acciones' }
                    ],
                    language: { /* Opciones de idioma aquí */ }
                });

                if (response.error) {
                    Swal.fire('Error', response.error, 'error');
                }
            },
            error: function (xhr, status, error) {
                handleAjaxError(status, error, xhr.responseText);
            }
        });
    }

    // Función genérica para manejar solicitudes AJAX
    function sendAjaxRequest(data, successCallback) {
        jQuery.ajax({
            url: ajaxUrl,
            method: 'POST',
            data: data,
            success: successCallback,
            error: function (xhr, status, error) {
                handleAjaxError(status, error, xhr.responseText);
            },
            complete: function () {
                jQuery('#guardarCategoria').prop('disabled', false); // Habilitar el botón nuevamente
            }
        });
    }

    // Manejar el clic en el botón para guardar una categoría (crear o actualizar)
    jQuery('#guardarCategoria').click(function () {
        const id = jQuery('#categoria_CategoriaID').val();
        const nombre = jQuery('#categoria_Nombre').val().trim();

        if (nombre === '') {
            Swal.fire('Error', 'El nombre no puede estar vacío.', 'error');
            return;
        }

        const action = id ? 'update-categoria' : 'create-categoria';
        const data = id ? { id: id, nombre: nombre, action: action } : { nombre: nombre, action: action };

        jQuery(this).prop('disabled', true); // Deshabilitar el botón para evitar múltiples clics

        // Llamar a la función genérica de AJAX
        sendAjaxRequest(data, function (response) {
            if (response.success) {
                Swal.fire('¡Guardado!', response.message, 'success');
                jQuery('#categoriaModal').modal('hide');
                loadCategorias(); // Volver a cargar categorías
            } else {
                Swal.fire('Error', response.error, 'error');
            }
        });
    });

    // Manejar el clic en el botón de edición dentro de la tabla
    jQuery('#categoriaTable tbody').on('click', '.edit-btn', function () {
        const id = jQuery(this).data('id');
        jQuery.ajax({
            url: ajaxUrl,
            data: { id: id, action: 'show-categoria' },
            success: function (response) {
                jQuery('#categoria_CategoriaID').val(response.data.CategoriaID);
                jQuery('#categoria_Nombre').val(response.data.Nombre);
                jQuery('#categoriaModal').modal('show'); // Mostrar modal para editar
            },
            error: function (xhr, status, error) {
                handleAjaxError(status, error, xhr.responseText);
            }
        });
    });

    // Manejar el clic en el botón de eliminación dentro de la tabla
    jQuery('#categoriaTable tbody').on('click', '.delete-btn', function () {
        const id = jQuery(this).data('id');
        Swal.fire({
            title: '¿Estás seguro de querer eliminar este registro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                sendAjaxRequest({ id: id, action: 'destroy-categoria' }, function (response) {
                    if (response.success) {
                        Swal.fire('¡Eliminado!', response.message, 'success');
                        loadCategorias(); // Volver a cargar categorías
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                });
            }
        });
    });

    // Función para manejar errores AJAX
    function handleAjaxError(status, error, responseText) {
        console.error("Error en la solicitud AJAX: ", status, error);
        try {
            var jsonResponse = JSON.parse(responseText);
            console.log("Respuesta JSON:", jsonResponse);
        } catch (e) {
            console.log("Respuesta no es JSON, contenido:", responseText);
        }
    }
});
