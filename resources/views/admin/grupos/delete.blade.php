<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">AVISO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pregunta">
                    ¿Desea eliminar el registro?
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_grupo" id="id_grupo_delete">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
