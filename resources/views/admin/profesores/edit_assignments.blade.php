<div class="modal fade" id="editAssignmentsModal" tabindex="-1" aria-labelledby="editAssignmentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editAssignmentsModalLabel">Asignar Profesores</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editAssignmentsForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label font-bold text-[#044C26]">Tutor Asignado (Solo Lectura):</label>
                        <input type="text" id="tutor_display" class="form-control bg-gray-100" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="profesores" class="form-label font-bold text-[#044C26]">Profesores Adicionales (Máx. 5):</label>
                        <select name="profesores[]" id="profesores_select" class="form-control" multiple="multiple" style="width: 100%;">
                            <!-- Options populated via JS -->
                        </select>
                        <small class="text-gray-500 mt-1 block">Seleccione hasta 5 profesores adicionales.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="editAssignmentsForm" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Guardar Asignaciones</button>
            </div>
        </div>
    </div>
</div>
