document.addEventListener("DOMContentLoaded", function () {
    // Modal de Edición de Salón
    const editaSalonModal = document.getElementById("editaSalonModal");

    if (editaSalonModal) {
        editaSalonModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // Extraer info de los atributos data-*
            const id = button.getAttribute("data-id");
            const claveSalon = button.getAttribute("data-clave_salon");

            // Construir la URL correctamente
            const form = editaSalonModal.querySelector("form");
            form.action = `/admin/salones/update/${id}`;

            // Actualizar los campos del modal
            document.getElementById("id_salon_edit").value = id;
            document.getElementById("clave_salon_edit").value = claveSalon;
        });
    }

    // Modal de Eliminación de Salón
    const deleteSalonModal = document.getElementById("deleteSalonModal");

    if (deleteSalonModal) {
        deleteSalonModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");

            // Actualizar el formulario
            const form = deleteSalonModal.querySelector("form");
            form.action = `/admin/salones/destroy/${id}`;

            // Actualizar el campo hidden
            document.getElementById("id_salon_delete").value = id;
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
