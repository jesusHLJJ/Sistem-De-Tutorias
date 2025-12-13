document.addEventListener('DOMContentLoaded', function () {
    // ==========================================
    // Lógica de Búsqueda y Filtrado
    // ==========================================
    const searchInput = document.getElementById('searchInput');
    const searchFilter = document.getElementById('searchFilter');
    const clearButton = document.getElementById('clearSearch');
    const materiaRows = document.querySelectorAll('.materia-row');
    const resultCount = document.getElementById('resultCount');
    const noResults = document.getElementById('noResults');

    // Verificar si existen elementos antes de ejecutar lógica
    if (searchInput && materiaRows.length > 0) {
        const totalGrupos = materiaRows.length;

        function filterMaterias() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const filterType = searchFilter.value;
            let visibleCount = 0;

            materiaRows.forEach(row => {
                const searchValue = row.getAttribute(`data-${filterType}`);

                if (searchValue && searchValue.includes(searchTerm)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Actualizar contador
            if (resultCount) {
                resultCount.innerHTML = `Mostrando <strong>${visibleCount}</strong> de <strong>${totalGrupos}</strong> grupos`;
            }

            // Mostrar mensaje si no hay resultados
            if (noResults) {
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
        }

        // Event listeners
        searchInput.addEventListener('input', filterMaterias);
        searchFilter.addEventListener('change', filterMaterias);

        if (clearButton) {
            clearButton.addEventListener('click', function () {
                searchInput.value = '';
                searchFilter.value = 'clave'; // Valor por defecto
                filterMaterias();
            });
        }
    }
});

// ==========================================
// Lógica de Modales (jQuery + Select2)
// ==========================================
$(document).ready(function () {

    // Inicializar Select2 para Crear
    $('#materia_create').select2({
        placeholder: "Seleccione hasta 6 materias",
        maximumSelectionLength: 6,
        width: '100%',
        dropdownParent: $('#registroModal')
    });

    // Inicializar Select2 para Editar
    $('#materia_edit').select2({
        placeholder: "Seleccione hasta 6 materias",
        maximumSelectionLength: 6,
        width: '100%',
        dropdownParent: $('#editaModal')
    });

    // Resetear Select2 al cerrar modales
    $('#registroModal').on('hidden.bs.modal', function () {
        $('#materia_create').val(null).trigger('change');
        $('#grupo_registro').val(''); // Resetear select de grupo también
    });

    $('#editaModal').on('hidden.bs.modal', function () {
        $('#materia_edit').val(null).trigger('change');
    });

    // Manejar clic en botón Editar
    $(document).on('click', '.btn-edit', function () {
        const button = $(this);
        const grupoId = button.data('id');
        const grupoClave = button.data('clave');
        const carreraId = button.data('carrera-id'); // Obtener ID de carrera
        const materias = button.data('materias'); // jQuery parsea JSON automáticamente

        // Llenar el formulario
        $('#grupo_clave_display').val(grupoClave);
        $('#grupo_id').val(grupoId);

        // Actualizar acción del formulario
        $('#editForm').attr('action', '/admin/materias/assignments/update/' + grupoClave);

        // Filtrar opciones del select
        const select = $('#materia_edit');

        // 1. Resetear selección
        select.val(null).trigger('change');

        // 2. Iterar sobre todas las opciones
        select.find('option').each(function () {
            const option = $(this);
            const materiaCarrera = option.data('carrera');

            // Si la carrera coincide o es una opción vacía/genérica (si hubiera), mostrar
            // Nota: Select2 oculta opciones con 'disabled', así que usaremos eso
            if (materiaCarrera == carreraId) {
                option.prop('disabled', false);
            } else {
                option.prop('disabled', true);
            }
        });

        // 3. Re-inicializar o actualizar Select2 para que refleje los cambios
        // Select2 automáticamente detecta cambios en 'disabled' si se destruye y recrea, 
        // o a veces solo con trigger('change.select2') si está configurado.
        // Pero para ocultar visualmente las deshabilitadas, es mejor recrearlo o usar CSS.
        // Select2 por defecto muestra las deshabilitadas en gris. Si queremos ocultarlas:
        // Una opción es detach() las que no sirven.

        // Enfoque alternativo: Detach y re-append
        // Guardar todas las opciones originales si no se ha hecho
        if (!select.data('all-options')) {
            select.data('all-options', select.find('option').clone());
        }

        // Restaurar todas primero
        select.empty().append(select.data('all-options').clone());

        // Filtrar removiendo las que no coinciden
        select.find('option').each(function () {
            const option = $(this);
            const materiaCarrera = option.data('carrera');
            if (materiaCarrera != carreraId) {
                option.remove();
            }
        });

        // Pre-seleccionar materias (solo las que quedaron y coinciden)
        if (materias) {
            // Filtrar materias seleccionadas para asegurar que solo se seleccionen las válidas (aunque el backend ya debería haberlo hecho)
            select.val(materias).trigger('change');
        }

        $('#editaModal').modal('show');
    });

    // Manejar clic en botón Eliminar
    $(document).on('click', '.btn-delete', function () {
        const button = $(this);
        const clave = button.data('clave');
        const count = button.data('count');

        // Actualizar acción del formulario
        $('#deleteForm').attr('action', '/admin/materias/destroy/' + clave);

        // Actualizar textos informativos
        $('#delete_clave').text(clave);
        $('#delete_count').text(count);

        $('#deleteModal').modal('show');
    });
});
