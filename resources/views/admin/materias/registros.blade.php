<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registroModalLabel">Asignar Materias</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.materias.store') }}" method="POST" id="asignarMateriasForm">
                    @csrf
                    <div class="contenido">
                        <label for="grupo">Grupo:</label>
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

                    <div class="contenido mt-3">
                        <label for="materia">Materias:</label>
                        <select name="materia[]" id="materia_registro" class="form-control" multiple>
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

                    <div class="contenido mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Incluir Select2 para mejor UI -->
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Inicializar Select2 cuando el modal se muestra completamente
        $('#registroModal').on('shown.bs.modal', function() {
            $('#materia_registro').select2({
                placeholder: "Seleccione hasta 6 materias",
                maximumSelectionLength: 6,
                width: '100%',
                dropdownParent: $('#registroModal')
            });
        });

        // Limpiar Select2 cuando el modal se cierra
        $('#registroModal').on('hidden.bs.modal', function() {
            $('#materia_registro').select2('destroy');
        });
    });
</script>
