document.addEventListener("DOMContentLoaded", function () {
    // Modal de Edición
    const editaModal = document.getElementById("editaModal");

    if (editaModal) {
        editaModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // 1. Extraer info de los atributos data-*
            const id = button.getAttribute("data-id");
            const clave_grupo = button.getAttribute("data-grupo");
            const carrera = button.getAttribute("data-carrera");
            const matricula = button.getAttribute("data-matricula");
            const nombre = button.getAttribute("data-nombre"); // <--- Nuevo

            // 2. Construir la URL (CORREGIDO: quitamos '/update' para seguir el estándar REST)
            const form = editaModal.querySelector("form");
            // Asegúrate que en tus rutas (web.php) la ruta sea así. 
            // Si usas resource, es: /admin/alumnos/1
            form.action = `/admin/alumnos/${id}`; 

            // 3. Actualizar los campos del modal
            document.getElementById("carrera_edit").value = carrera;
            document.getElementById("grupo_edit").value = clave_grupo;
            document.getElementById("matricula_edit").value = matricula;
            
            // Asegúrate de tener este input en tu modal con id="nombre_edit"
            const nombreInput = document.getElementById("nombre_edit"); 
            if(nombreInput) nombreInput.value = nombre;
        });
    }

    // Modal de Eliminación
    const deleteModal = document.getElementById("deleteModal");

    if (deleteModal) {
        deleteModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");

            const form = deleteModal.querySelector("form");
            // CORREGIDO: Igualmente, resource suele ser DELETE /admin/alumnos/{id}
            // Si tu ruta es personalizada y lleva 'destroy', déjalo como estaba.
            form.action = `/admin/alumnos/${id}`; 

            // Si usas el método DELETE en el form, no necesitas un input hidden extra
            // a menos que tu lógica lo requiera específicamente.
        });
    }
});

// Auto-cierre de alertas
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        const alerts = document.querySelectorAll(".alert");
        alerts.forEach((alert) => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});