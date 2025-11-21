<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar Grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="contenido">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera_edit" class="form-control">
                            <option value="">Seleccione una Carrera:</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="semestre">Semestre:</label>
                        <select name="semestre" id="semestre_edit" class="form-control">
                            <option value="">Seleccione un Semestre:</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id_semestre }}">{{ $semestre->semestre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="turno">Turno:</label>
                        <select name="turno" id="turno_edit" class="form-control">
                            <option value="">Seleccione un Turno:</option>
                            @foreach ($turnos as $turno)
                                <option value="{{ $turno->id_turno }}">{{ $turno->turno }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="clave_grupo">Clave de Grupo:</label>
                        <input type="text" name="clave_grupo" id="clave_grupo_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="profesor">Profesor:</label>
                        <select name="profesor" id="profesor_edit" class="form-control">
                            <option value="">Seleccione un Profesor:</option>
                            @foreach ($profesores as $profesor)
                                <option value="{{ $profesor->id_profesor }}">{{ $profesor->nombre_completo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="periodo">Periodo:</label>
                        <input type="text" name="id_periodo" id="periodo_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="salon">Salon:</label>
                        <select name="salon" id="salon_edit" class="form-control">
                            <option value="">Seleccione un Salon:</option>
                            @foreach ($salones as $salon)
                                <option value="{{ $salon->id_salon }}">{{ $salon->clave_salon }}</option>
                            @endforeach
                        </select>
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
