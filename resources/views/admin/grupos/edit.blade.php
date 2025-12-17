<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editaModalLabel">Editar Grupo</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="contenido mb-3">
                        <label for="carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                        <select name="carrera" id="carrera_edit" class="form-control">
                            <option value="">Seleccione una Carrera:</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="semestre" class="form-label font-bold text-[#044C26]">Semestre:</label>
                        <select name="semestre" id="semestre_edit" class="form-control">
                            <option value="">Seleccione un Semestre:</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id_semestre }}">{{ $semestre->semestre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="turno" class="form-label font-bold text-[#044C26]">Turno:</label>
                        <select name="turno" id="turno_edit" class="form-control">
                            <option value="">Seleccione un Turno:</option>
                            @foreach ($turnos as $turno)
                                <option value="{{ $turno->id_turno }}">{{ $turno->turno }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="clave_grupo" class="form-label font-bold text-[#044C26]">Clave de Grupo:</label>
                        <input type="text" name="clave_grupo" id="clave_grupo_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="profesor" class="form-label font-bold text-[#044C26]">Tutor:</label>
                        <select name="profesor" id="profesor_edit" class="form-control">
                            <option value="">Seleccione un Tutor:</option>
                            @foreach ($profesores as $profesor)
                                <option value="{{ $profesor->id_profesor }}" data-carrera="{{ $profesor->id_carrera }}">{{ $profesor->nombre_completo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="periodo" class="form-label font-bold text-[#044C26]">Periodo:</label>
                        <input type="text" name="id_periodo" id="periodo_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="salon" class="form-label font-bold text-[#044C26]">Salon:</label>
                        <select name="salon" id="salon_edit" class="form-control">
                            <option value="">Seleccione un Salon:</option>
                            @foreach ($salones as $salon)
                                <option value="{{ $salon->id_salon }}">{{ $salon->clave_salon }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="editForm" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Actualizar</button>
            </div>
        </div>
    </div>
</div>
