<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-red-600 text-white">
                <h5 class="modal-title font-montserrat font-bold" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
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
                        <span id="delete_count" class="badge bg-[#3B82F6]">0</span>
                    </p>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="deleteForm" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
