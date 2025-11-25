<div class="modal fade" id="registroSalonModal" tabindex="-1" aria-labelledby="registroSalonModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registroSalonModalLabel">Agregar Salón</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.salones.store') }}" method="POST">
                    @csrf
                    <div class="contenido">
                        <label for="clave_salon">Clave del Salón:</label>
                        <input type="text" 
                               name="clave_salon" 
                               id="clave_salon_registro" 
                               class="form-control" 
                               maxlength="25"
                               placeholder="Ej: A-101, B-205, LAB-3"
                               required>
                        <small class="form-text text-muted">Máximo 25 caracteres</small>
                    </div>

                    <div class="contenido mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
