<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-red-600 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="deleteModalLabel">AVISO</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_profesor" id="id_profesor_delete">
                    <div class="pregunta">
                        ¿Desea eliminar el registro?
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="deleteForm" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition">Eliminar</button>
            </div>
        </div>
    </div>
</div>
