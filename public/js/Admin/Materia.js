let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    processing: true,
    serverSide: true,
    ajax: {
        url: API_URL,
        type: "GET",
    },
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },
        {
            data: "clave_grupo",
            name: "clave_grupo",
        },
        {
            data: "materias_count",
            name: "materias_count",
            render: function (data) {
                return data > 0 ? data : "0";
            },
        },
        {
            data: null,
            render: function (data, type, row) {
                return renderActionButtons(row);
            },
            orderable: false,
            searchable: false,
        },
    ],
};

// Renderizado de botones en DataTables
function renderActionButtons(row) {
    // Obtener array de IDs de materias
    const materiasIds = row.materias
        ? row.materias.map((m) => m.id_materia)
        : [];

    return `
        <button class="btn btn-sm btn-warning btn-edit"
                data-clave_grupo="${row.clave_grupo}"
                data-grupo-id="${row.id_grupo}"
                data-grupo-clave="${row.clave_grupo}"
                data-materias='${JSON.stringify(materiasIds)}'
                data-materias-count="${row.materias_count || 0}">
            <i class="fa-solid fa-user-pen"></i>
        </button>
        <button class="btn btn-sm btn-danger btn-delete"
                data-clave_grupo="${row.clave_grupo}"
                data-materias-count="${row.materias_count || 0}">
            <i class="fa-solid fa-trash"></i>
        </button>
    `;
}

const initDataTable = async () => {
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }

    dataTable = $("#datatable_Materias").DataTable(dataTableOptions);
    dataTableIsInitialized = true;
};

function setupModalEvents() {
    // Cachea los elementos del DOM
    const $editaModal = $("#editaModal");
    const $deleteModal = $("#deleteModal");

    $(document).on("click", ".btn-edit", function () {
        const button = $(this);
        const form = $editaModal.find("form");

        // Prepara todos los datos primero
        const formData = {
            action: `/admin/materias/update/${button.data("clave_grupo")}`,
            values: {
                "#grupo_registro": button.data("grupo-id"),
                "#grupo_clave_display": button.data("grupo-clave"),
            },
            materias: button.data("materias") || [],
        };

        // Aplica todos los cambios de una vez
        requestAnimationFrame(() => {
            form.attr("action", formData.action);

            // Asigna valores simples
            for (const selector in formData.values) {
                $editaModal.find(selector).val(formData.values[selector]);
            }

            // Maneja las materias (selección múltiple)
            $("#materia_registro").val(null).trigger("change");
            if (formData.materias.length > 0) {
                $("#materia_registro").val(formData.materias).trigger("change");
            }

            $editaModal.modal("show");
        });
    });

    $(document).on("click", ".btn-delete", function () {
        const button = $(this);
        const form = $deleteModal.find("form");

        requestAnimationFrame(() => {
            form.attr(
                "action",
                `/admin/materias/destroy/${button.data("clave_grupo")}`
            );

            // Actualiza la UI en un solo paso
            $deleteModal.find("#delete_clave").text(button.data("clave_grupo"));
            $deleteModal
                .find("#delete_count")
                .text(button.data("materias-count") || 0);

            $deleteModal.modal("show");
        });
    });
}

// Inicialización
window.addEventListener("load", async () => {
    await initDataTable();
    setupModalEvents();
});
