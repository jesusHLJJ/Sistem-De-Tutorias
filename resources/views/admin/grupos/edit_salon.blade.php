<div class="modal fade" id="editaSalonModal" tabindex="-1" aria-labelledby="editaSalonModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editaSalonModalLabel">Editar Salón</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="" method="POST" id="formEditaSalon">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="id_salon" id="id_salon_edit">
                    
                    <div class="contenido mb-3">
                        <label for="clave_salon_edit" class="form-label font-bold text-[#044C26]">Clave del Salón:</label>
                        <input type="text" 
                               name="clave_salon" 
                               id="clave_salon_edit" 
                               class="form-control" 
                               maxlength="25"
                               required>
                        <small class="form-text text-muted">Máximo 25 caracteres</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formEditaSalon" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Actualizar</button>
            </div>
        </div>
    </div>
</div>
