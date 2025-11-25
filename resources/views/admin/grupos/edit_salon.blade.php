<div class="modal fade" id="editaSalonModal" tabindex="-1" aria-labelledby="editaSalonModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaSalonModalLabel">Editar Salón</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="formEditaSalon">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="id_salon" id="id_salon_edit">
                    
                    <div class="contenido">
                        <label for="clave_salon_edit">Clave del Salón:</label>
                        <input type="text" 
                               name="clave_salon" 
                               id="clave_salon_edit" 
                               class="form-control" 
                               maxlength="25"
                               required>
                        <small class="form-text text-muted">Máximo 25 caracteres</small>
                    </div>

                    <div class="contenido mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
