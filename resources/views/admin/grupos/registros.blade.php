<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-[#13934A] text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="registroModalLabel">Agregar Grupo</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.grupos.store') }}" method="POST" id="createGrupoForm">
                    @csrf
                    <div class="contenido mb-3">
                        <label for="carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                        <select name="carrera" id="carrera_registro" class="form-control">
                            <option value="">Seleccione una Carrera:</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="semestre" class="form-label font-bold text-[#044C26]">Semestre:</label>
                        <select name="semestre" id="semestre_registro" class="form-control">
                            <option value="">Seleccione un Semestre:</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id_semestre }}">{{ $semestre->semestre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="turno" class="form-label font-bold text-[#044C26]">Turno:</label>
                        <select name="turno" id="turno_registro" class="form-control">
                            <option value="">Seleccione un Turno:</option>
                            @foreach ($turnos as $turno)
                                <option value="{{ $turno->id_turno }}">{{ $turno->turno }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="clave_grupo" class="form-label font-bold text-[#044C26]">Clave de Grupo:</label>
                        <input type="text" name="clave_grupo" id="clave_grupo_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="profesor" class="form-label font-bold text-[#044C26]">Tutor:</label>
                        <select name="profesor" id="profesor_registro" class="form-control">
                            <option value="">Seleccione un Tutor:</option>
                            @foreach ($profesores as $profesor)
                                <option value="{{ $profesor->id_profesor }}">{{ $profesor->nombre_completo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="periodo" class="form-label font-bold text-[#044C26]">Periodo:</label>
                        <input type="text" name="periodo" id="periodo_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="salon" class="form-label font-bold text-[#044C26]">Salon:</label>
                        <select name="salon" id="salon_registro" class="form-control">
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
                <button type="submit" form="createGrupoForm" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 rounded transition">Agregar</button>
            </div>
        </div>
    </div>
</div>
