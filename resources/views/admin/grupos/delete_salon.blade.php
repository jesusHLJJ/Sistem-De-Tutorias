<div class="modal fade" id="deleteSalonModal" tabindex="-1" aria-labelledby="deleteSalonModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="deleteSalonModalLabel">
                    <i class="fa-solid fa-triangle-exclamation"></i> Confirmar Eliminación
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <i class="fa-solid fa-exclamation-triangle"></i>
                    <strong>¡Advertencia!</strong> Esta acción no se puede deshacer.
                </div>
                
                <p class="mb-3">¿Está seguro que desea eliminar este salón?</p>
                <p class="text-muted small">
                    <i class="fa-solid fa-info-circle"></i>
                    Nota: No se puede eliminar un salón que esté asignado a uno o más grupos.
                </p>
                
                <form action="" method="POST" id="formDeleteSalon">
                    @csrf
                    @method('DELETE')
                    
                    <input type="hidden" name="id_salon" id="id_salon_delete">

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
