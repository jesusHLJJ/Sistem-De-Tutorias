<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar Profesor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_profesor" id="id_profesor_edit">

                    <div class="contenido">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera_edit" class="form-control">
                            <option value="">Seleccione una Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="clave">Clave:</label>
                        <input type="text" name="clave" id="clave_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="ap_paterno">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" id="ap_paterno_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="ap_materno">Ap. Materno:</label>
                        <input type="text" name="ap_materno" id="ap_materno_edit" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email_edit" class="form-control"
                            autocomplete="current-email">
                    </div>

                    <div class="contenido">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password_edit" class="form-control"
                            autocomplete="new-password">
                    </div>

                    <div class="contenido">
                        <label for="password_confirmation">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation_edit"
                            class="form-control" autocomplete="new-password">
                    </div>

                    <div class="contenido mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
