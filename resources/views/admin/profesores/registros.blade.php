<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-2xl rounded-2xl" style="background-color: white;">
            <div class="modal-header bg-[#13934A] text-white">
                <h1 class="modal-title fs-5 font-montserrat font-bold" id="registroModalLabel">Agregar Profesor</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-montserrat">
                <form action="{{ route('admin.profesores.store') }}" method="POST" id="createProfesorForm">
                    @csrf

                    <div class="contenido mb-3">
                        <label for="carrera" class="form-label font-bold text-[#044C26]">Carrera:</label>
                        <select name="carrera" id="carrera_registro" class="form-control">
                            <option value="">Seleccione una Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido mb-3">
                        <label for="clave" class="form-label font-bold text-[#044C26]">Clave:</label>
                        <input type="text" name="clave" id="clave_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="nombre" class="form-label font-bold text-[#044C26]">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="ap_paterno" class="form-label font-bold text-[#044C26]">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" id="ap_paterno_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="ap_materno" class="form-label font-bold text-[#044C26]">Ap. Materno:</label>
                        <input type="text" name="ap_materno" id="ap_materno_registro" class="form-control">
                    </div>

                    <div class="contenido mb-3">
                        <label for="email" class="form-label font-bold text-[#044C26]">Email:</label>
                        <input type="email" name="email" id="email_registro" class="form-control"
                            autocomplete="new-email">
                    </div>

                    <div class="contenido mb-3">
                        <label for="password" class="form-label font-bold text-[#044C26]">Contraseña:</label>
                        <input type="password" name="password" id="password_registro" class="form-control"
                            autocomplete="new-password">
                    </div>

                    <div class="contenido mb-3">
                        <label for="password_confirmation" class="form-label font-bold text-[#044C26]">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation_registro"
                            class="form-control" autocomplete="new-password">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-t-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="createProfesorForm" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 rounded transition">Registrar</button>
            </div>
        </div>
    </div>
</div>
