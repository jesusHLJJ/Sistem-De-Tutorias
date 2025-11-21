document.addEventListener("DOMContentLoaded", function () {
    // Modal de Edición
    const editaModal = document.getElementById("editaModal");

    if (editaModal) {
        editaModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // Extraer info de los atributos data-*
            const id = button.getAttribute("data-id");
            const clave_grupo = button.getAttribute("data-clave_grupo");
            const carrera = button.getAttribute("data-carrera");
            const profesor = button.getAttribute("data-profesor");
            const periodo = button.getAttribute("data-periodo");
            const salon = button.getAttribute("data-salon");
            const semestre = button.getAttribute("data-semestre");
            const turno = button.getAttribute("data-turno");

            // Construir la URL correctamente
            const form = editaModal.querySelector("form");
            form.action = `/admin/grupos/update/${id}`;

            // Actualizar los campos del modal
            document.getElementById("carrera_edit").value = carrera;
            document.getElementById("semestre_edit").value = semestre;
            document.getElementById("turno_edit").value = turno;
            document.getElementById("clave_grupo_edit").value = clave_grupo;
            document.getElementById("profesor_edit").value = profesor;
            document.getElementById("periodo_edit").value = periodo;
            document.getElementById("salon_edit").value = salon;
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
            form.action = `/admin/grupos/destroy/${id}`;

            // Actualizar el campo hidden
            document.getElementById("id_grupo_delete").value = id;
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
