<div class="modal fade" id="createMateriaModal" tabindex="-1" aria-labelledby="createMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-[#13934A] text-white">
                <h5 class="modal-title font-montserrat font-bold" id="createMateriaModalLabel">Registrar Nueva Materia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.materias.create') }}" method="POST" id="createMateriaForm">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="id_carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                            <select name="id_carrera" id="id_carrera" class="form-select" required>
                                <option value="">Seleccione una carrera...</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}" {{ old('id_carrera') == $carrera->id_carrera ? 'selected' : '' }}>{{ $carrera->carrera }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="id_semestre" class="form-label font-bold text-[#044C26]">Semestre:</label>
                            <select name="id_semestre" id="id_semestre" class="form-select" required>
                                <option value="">Seleccione un semestre...</option>
                                @foreach($semestres as $semestre)
                                    <option value="{{ $semestre->id_semestre }}" {{ old('id_semestre') == $semestre->id_semestre ? 'selected' : '' }}>{{ $semestre->semestre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="nombre" class="form-label font-bold text-[#044C26]">Nombre de la Materia:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ej. Programación Orientada a Objetos" value="{{ old('nombre') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="clave_materia" class="form-label font-bold text-[#044C26]">Clave:</label>
                            <input type="text" class="form-control" id="clave_materia" name="clave_materia" required placeholder="Ej. SCD-1020" value="{{ old('clave_materia') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="HRS_TEORICAS" class="form-label font-bold text-[#044C26]">Hrs. Teóricas:</label>
                            <input type="number" class="form-control" id="HRS_TEORICAS" name="HRS_TEORICAS" required min="0" value="{{ old('HRS_TEORICAS', 0) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="HRS_PRACTICAS" class="form-label font-bold text-[#044C26]">Hrs. Prácticas:</label>
                            <input type="number" class="form-control" id="HRS_PRACTICAS" name="HRS_PRACTICAS" required min="0" value="{{ old('HRS_PRACTICAS', 0) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="creditos" class="form-label font-bold text-[#044C26]">Créditos:</label>
                            <input type="number" class="form-control" id="creditos" name="creditos" required min="0" value="{{ old('creditos', 0) }}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="createMateriaForm" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 rounded transition">
                    Registrar Materia
                </button>
            </div>
        </div>
    </div>
</div>
