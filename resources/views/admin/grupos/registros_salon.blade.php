<div class="modal fade" id="registroSalonModal" tabindex="-1" aria-labelledby="registroSalonModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-[#3B82F6] text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="registroSalonModalLabel">Agregar Salón</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.salones.store') }}" method="POST" id="createSalonForm">
                    @csrf
                    <div class="contenido mb-3">
                        <label for="clave_salon" class="form-label font-bold text-[#044C26]">Clave del Salón:</label>
                        <input type="text" 
                               name="clave_salon" 
                               id="clave_salon_registro" 
                               class="form-control" 
                               maxlength="25"
                               placeholder="Ej: A-101, B-205, LAB-3"
                               required>
                        <small class="form-text text-muted">Máximo 25 caracteres</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="createSalonForm" class="bg-[#3B82F6] hover:bg-[#2563EB] text-white font-bold py-2 px-4 rounded transition">Agregar</button>
            </div>
        </div>
    </div>
</div>
