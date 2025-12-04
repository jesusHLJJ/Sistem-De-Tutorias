<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar Materias del Grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="contenido">
                        <label for="grupo">Grupo:</label>
                        <input type="text" id="grupo_clave_display" class="form-control" readonly>
                        <input type="hidden" name="grupo_id" id="grupo_id">
                    </div>

                    <div class="contenido mt-3">
                        <label for="materia">Materias:</label>
                        <select name="materia[]" id="materia_registro" class="form-control select2-materias" multiple>
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
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Inicializar Select2
        $('.select2-materias').select2({
            placeholder: "Seleccione hasta 6 materias",
            maximumSelectionLength: 6,
            width: '100%',
            dropdownParent: $('#editaModal')
        });

        // Manejar la apertura del modal
        $(document).on('click', '.btn-edit', function() {
            const button = $(this);
            const grupoId = button.data('id');
            const grupoClave = button.data('clave');
            const materiasSeleccionadas = button.data('materias') || [];

            // Actualizar el modal
            $('#grupo_clave_display').val(grupoClave);
            $('#grupo_id').val(grupoId);
            $('#editForm').attr('action', '/admin/materias/update/' + grupoId);

            // Seleccionar materias existentes - IMPORTANTE
            $('#materia_registro').val(materiasSeleccionadas).trigger('change.select2');

            // Mostrar el modal
            $('#editaModal').modal('show');
        });

        // Limpiar al cerrar
        $('#editaModal').on('hidden.bs.modal', function() {
            $('#materia_registro').val(null).trigger('change.select2');
        });
    });
</script>
