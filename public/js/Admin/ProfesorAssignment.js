document.addEventListener('DOMContentLoaded', function () {
    // Inicializar Select2
    $('#profesores_select').select2({
        dropdownParent: $('#editAssignmentsModal'),
        placeholder: 'Seleccione profesores...',
        maximumSelectionLength: 5,
        language: {
            maximumSelected: function (e) {
                return "Solo puedes seleccionar hasta " + e.maximum + " profesores";
            },
            noResults: function () {
                return "No se encontraron resultados";
            }
        }
    });

    const editModal = document.getElementById('editAssignmentsModal');

    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const claveGrupo = button.getAttribute('data-clave');
            const form = document.getElementById('editAssignmentsForm');
            const tutorDisplay = document.getElementById('tutor_display');
            const profesoresSelect = $('#profesores_select');

            // Resetear formulario
            form.action = `/admin/profesores/assignments/update/${claveGrupo}`;
            tutorDisplay.value = 'Cargando...';
            profesoresSelect.val(null).trigger('change');
            profesoresSelect.empty();

            // Cargar datos
            fetch(`/admin/profesores/assignments/edit/${claveGrupo}`)
                .then(response => response.json())
                .then(data => {
                    // Mostrar Tutor
                    if (data.tutor) {
                        tutorDisplay.value = data.tutor.nombre + ' ' + (data.tutor.ap_paterno || '') + ' ' + (data.tutor.ap_materno || '');
                    } else {
                        tutorDisplay.value = 'Sin Tutor Asignado';
                    }

                    // Llenar Select2 con profesores disponibles
                    data.profesores_disponibles.forEach(profesor => {
                        // No incluir al tutor en la lista de seleccionables si se desea evitar duplicidad visual,
                        // aunque el backend lo permite. Aquí asumimos que el tutor NO debe ser seleccionado como "adicional".
                        if (!data.tutor || profesor.id_profesor !== data.tutor.id_profesor) {
                            const option = new Option(
                                profesor.nombre + ' ' + (profesor.ap_paterno || '') + ' ' + (profesor.ap_materno || ''),
                                profesor.id_profesor,
                                false,
                                false
                            );
                            profesoresSelect.append(option);
                        }
                    });

                    // Seleccionar los ya asignados
                    profesoresSelect.val(data.profesores_asignados).trigger('change');
                })
                .catch(error => {
                    console.error('Error:', error);
                    tutorDisplay.value = 'Error al cargar datos';
                });
        });
    }

    // Auto-cierre de alertas
    setTimeout(function () {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
