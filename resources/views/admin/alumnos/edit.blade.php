<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editaModalLabel">Editar Alumno</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="contenido mb-3">
                        <label for="grupo" class="form-label font-bold text-[#044C26]">Grupo:</label>
                        <select name="grupo" id="grupo_edit" class="form-control">
                            <option value="">Seleccione un Grupo:</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id_grupo }}">{{ $grupo->clave_grupo }}</option>
                            @endforeach
                        </select>
                    </div>

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
                        <label for="matricula" class="form-label font-bold text-[#044C26]">Matricula:</label>
                        <input type="text" name="matricula" id="matricula_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="nombre" class="form-label font-bold text-[#044C26]">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_edit" class="form-control">
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