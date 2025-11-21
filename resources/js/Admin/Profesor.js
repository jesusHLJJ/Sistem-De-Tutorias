document.addEventListener("DOMContentLoaded", function () {
    // Modal de Edición
    const editaModal = document.getElementById("editaModal");

    if (editaModal) {
        editaModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // Extraer info de los atributos data-*
            const id = button.getAttribute("data-id");
            const carrera = button.getAttribute("data-carrera");
            const clave = button.getAttribute("data-clave");
            const nombre = button.getAttribute("data-nombre");
            const ap_paterno = button.getAttribute("data-ap_paterno");
            const ap_materno = button.getAttribute("data-ap_materno");
            const email = button.getAttribute("data-email");

            // Construir la URL correctamente
            const form = editaModal.querySelector("form");
            form.action = `/admin/profesores/update/${id}`;

            // Actualizar los campos del modal
            document.getElementById("id_profesor_edit").value = id;
            document.getElementById("carrera_edit").value = carrera;
            document.getElementById("clave_edit").value = clave;
            document.getElementById("nombre_edit").value = nombre;
            document.getElementById("ap_paterno_edit").value = ap_paterno;
            document.getElementById("ap_materno_edit").value = ap_materno;
            document.getElementById("email_edit").value = email;
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
            form.action = `/admin/profesores/destroy/${id}`;

            // Actualizar el campo hidden
            document.getElementById("id_profesor_delete").value = id;
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
