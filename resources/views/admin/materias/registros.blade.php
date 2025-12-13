<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-[#13934A] text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="registroModalLabel">Asignar Materias</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.materias.store') }}" method="POST" id="asignarMateriasForm">
                    @csrf
                    <div class="contenido mb-3">
                        <label for="grupo" class="form-label font-bold text-[#044C26]">Grupo:</label>
                        <select name="grupo" id="grupo_registro"
                            class="form-control @error('grupo') is-invalid @enderror">
                            <option value="">Seleccione un Grupo:</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id_grupo }}">
                                    {{ $grupo->clave_grupo }}
                                </option>
                            @endforeach
                        </select>
                        @error('grupo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contenido mt-3 mb-3">
                        <label for="materia" class="form-label font-bold text-[#044C26]">Materias:</label>
                        <select name="materia[]" id="materia_create" class="form-control" multiple>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id_materia }}">
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
                <button type="submit" form="asignarMateriasForm" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 rounded transition">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- Incluir Select2 para mejor UI -->
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>


