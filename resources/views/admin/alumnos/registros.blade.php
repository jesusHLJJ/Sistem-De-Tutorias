<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registroModalLabel">Agregar Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.alumnos.store') }}" method="POST">
                    @csrf
                    <div class="contenido">
                        <label for="grupo">Grupo:</label>
                        <select name="grupo" id="grupo_registro" class="form-control">
                            <option value="">Seleccione un Grupo:</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id_grupo }}">{{ $grupo->clave_grupo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera_registro" class="form-control">
                            <option value="">Seleccione una Carrera:</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="matricula">Matricula:</label>
                        <input type="text" name="matricula" id="matricula_registro" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_registro" class="form-control">
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
