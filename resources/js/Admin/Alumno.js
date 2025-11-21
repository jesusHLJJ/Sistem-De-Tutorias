document.addEventListener("DOMContentLoaded", function () {
    // Modal de Edición
    const editaModal = document.getElementById("editaModal");

    

    if (editaModal) {
        editaModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // Extraer info de los atributos data-*
            const id = button.getAttribute("data-id");
            const clave_grupo = button.getAttribute("data-grupo");
            const carrera = button.getAttribute("data-carrera");
            const matricula = button.getAttribute("data-matricula");

            // Construir la URL correctamente
            const form = editaModal.querySelector("form");
            form.action = `/admin/alumnos/${id}`;

            // Actualizar los campos del modal
            document.getElementById("carrera_edit").value = carrera;
            document.getElementById("grupo_edit").value = clave_grupo;
            document.getElementById("matricula_edit").value = matricula;
        });
    }

    // Modal de Eliminación
    const deleteModal = document.getElementById("deleteModal");

    if (deleteModal) {
        deleteModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");

            // Actualizar el formulario
            const form = deleteModal.querySelector("form");
            form.action = `/admin/alumnos/${id}`;

            // Actualizar el campo hidden
            document.getElementById("id_alumno_delete").value = id;
        });
    }
});

// Auto-cierre de alertas después de 5 segundos
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        const alerts = document.querySelectorAll(".alert");
        alerts.forEach((alert) => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});