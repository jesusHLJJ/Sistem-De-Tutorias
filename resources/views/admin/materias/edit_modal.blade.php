<div class="modal fade" id="editMateriaModal" tabindex="-1" aria-labelledby="editMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h5 class="modal-title font-montserrat font-bold" id="editMateriaModalLabel">Editar Materia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editMateriaForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="edit_id_carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                            <select name="id_carrera" id="edit_id_carrera" class="form-select" required>
                                <option value="">Seleccione una carrera...</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="edit_id_semestre" class="form-label font-bold text-[#044C26]">Semestre:</label>
                            <select name="id_semestre" id="edit_id_semestre" class="form-select" required>
                                <option value="">Seleccione un semestre...</option>
                                @foreach($semestres as $semestre)
                                    <option value="{{ $semestre->id_semestre }}">{{ $semestre->semestre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="edit_nombre" class="form-label font-bold text-[#044C26]">Nombre de la Materia:</label>
                            <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_clave_materia" class="form-label font-bold text-[#044C26]">Clave:</label>
                            <input type="text" class="form-control" id="edit_clave_materia" name="clave_materia" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="edit_HRS_TEORICAS" class="form-label font-bold text-[#044C26]">Hrs. Teóricas:</label>
                            <input type="number" class="form-control" id="edit_HRS_TEORICAS" name="HRS_TEORICAS" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_HRS_PRACTICAS" class="form-label font-bold text-[#044C26]">Hrs. Prácticas:</label>
                            <input type="number" class="form-control" id="edit_HRS_PRACTICAS" name="HRS_PRACTICAS" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_creditos" class="form-label font-bold text-[#044C26]">Créditos:</label>
                            <input type="number" class="form-control" id="edit_creditos" name="creditos" required min="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="editMateriaForm" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">
                    Actualizar Materia
                </button>
            </div>
        </div>
    </div>
</div>
