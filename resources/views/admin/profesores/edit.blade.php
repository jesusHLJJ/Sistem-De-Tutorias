<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-yellow-500 text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="editaModalLabel">Editar Profesor</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_profesor" id="id_profesor_edit">

                    <div class="contenido mb-3">
                        <label for="carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                        <select name="carrera" id="carrera_edit" class="form-control">
                            <option value="">Seleccione una Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="clave" class="form-label font-bold text-[#044C26]">Clave:</label>
                        <input type="text" name="clave" id="clave_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="nombre" class="form-label font-bold text-[#044C26]">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="ap_paterno" class="form-label font-bold text-[#044C26]">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" id="ap_paterno_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="ap_materno" class="form-label font-bold text-[#044C26]">Ap. Materno:</label>
                        <input type="text" name="ap_materno" id="ap_materno_edit" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="email" class="form-label font-bold text-[#044C26]">Email:</label>
                        <input type="email" name="email" id="email_edit" class="form-control"
                            autocomplete="current-email">
                    </div>

                    <div class="contenido mb-3">
                        <label for="password" class="form-label font-bold text-[#044C26]">Contraseña:</label>
                        <input type="password" name="password" id="password_edit" class="form-control"
                            autocomplete="new-password">
                    </div>

                    <div class="contenido mb-3">
                        <label for="password_confirmation" class="form-label font-bold text-[#044C26]">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation_edit"
                            class="form-control" autocomplete="new-password">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="editForm" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Editar</button>
            </div>
        </div>
    </div>
</div>
