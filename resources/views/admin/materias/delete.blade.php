<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        ¿Estás seguro que deseas eliminar todas las materias asignadas al grupo
                        <strong id="delete_clave"></strong>?
                    </div>

                    <p class="mb-0">
                        <strong>Materias asignadas:</strong>
                        <span id="delete_count" class="badge bg-primary">0</span>
                    </p>

                    <input type="hidden" id="grupo_id" name="grupo_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="deleteForm" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Manejar el envío del formulario de eliminación
        $('#deleteForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const url = form.attr('action');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize(),
                success: function(response) {
                    $('#deleteModal').modal('hide');

                    // Recargar la tabla DataTable
                    if (typeof dataTable !== 'undefined') {
                        dataTable.ajax.reload(null, false);
                    }

                    // Mostrar notificación de éxito
                    showAlert('success', response.message ||
                        'Materias eliminadas correctamente');
                },
                error: function(xhr) {
                    showAlert('danger', xhr.responseJSON?.message ||
                        'Error al eliminar las materias');
                }
            });
        });
    });

    function showAlert(type, message) {
        const alert = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;

        // Insertar la alerta al inicio del contenedor principal
        $('.container.my-3').prepend(alert);

        // Cerrar automáticamente después de 3 segundos
        setTimeout(() => {
            $('.alert').alert('close');
        }, 3000);
    }
</script>
