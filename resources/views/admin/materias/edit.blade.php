<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editaModalLabel">Editar Materias del Grupo</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="contenido mb-3">
                        <label for="grupo" class="form-label font-bold text-[#044C26]">Grupo:</label>
                        <input type="text" id="grupo_clave_display" class="form-control" readonly>
                        <input type="hidden" name="grupo_id" id="grupo_id">
                    </div>

                    <div class="contenido mt-3 mb-3">
                        <label for="materia" class="form-label font-bold text-[#044C26]">Materias:</label>
                        <select name="materia[]" id="materia_edit" class="form-control select2-materias" multiple>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id_materia }}" data-carrera="{{ $materia->id_carrera }}">
                                    {{ $materia->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <small id="materiaHelp" class="form-text text-muted">Seleccione hasta 6 materias</small>
                        @error('materia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('materia.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="editForm" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>


