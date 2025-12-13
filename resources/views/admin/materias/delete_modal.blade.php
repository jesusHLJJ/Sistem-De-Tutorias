<div class="modal fade" id="deleteMateriaModal" tabindex="-1" aria-labelledby="deleteMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-red-600 text-white">
                <h5 class="modal-title font-montserrat font-bold" id="deleteMateriaModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="deleteMateriaForm">
                    @csrf
                    @method('DELETE')
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        ¿Estás seguro que deseas eliminar la materia <strong id="delete_nombre_materia"></strong>?
                    </div>
                    
                    <p class="text-sm text-gray-600">Esta acción no se puede deshacer.</p>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="deleteMateriaForm" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition">
                    Eliminar Materia
                </button>
            </div>
        </div>
    </div>
</div>
