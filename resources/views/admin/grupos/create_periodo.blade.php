<div class="modal fade" id="createPeriodoModal" tabindex="-1" aria-labelledby="createPeriodoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl">
            <div class="modal-header bg-[#13934A] text-white">
                <h5 class="modal-title font-montserrat font-bold" id="createPeriodoModalLabel">Agregar Nuevo Periodo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.periodos.store') }}" method="POST" id="createPeriodoForm">
                    @csrf
                    <div class="mb-3">
                        <label for="periodo_nuevo" class="form-label font-bold text-[#044C26]">Nombre del Periodo:</label>
                        <input type="text" name="periodo" id="periodo_nuevo" class="form-control" placeholder="Ej. 2024-1" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="createPeriodoForm" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 rounded transition">Guardar Periodo</button>
            </div>
        </div>
    </div>
</div>
