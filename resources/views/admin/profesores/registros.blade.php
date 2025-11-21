<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registroModalLabel">Agregar Profesor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.profesores.store') }}" method="POST">
                    @csrf

                    <div class="contenido">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera_registro" class="form-control">
                            <option value="">Seleccione una Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contenido">
                        <label for="clave">Clave:</label>
                        <input type="text" name="clave" id="clave_registro" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre_registro" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="ap_paterno">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" id="ap_paterno_registro" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="ap_materno">Ap. Materno:</label>
                        <input type="text" name="ap_materno" id="ap_materno_registro" class="form-control">
                    </div>

                    <div class="contenido">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email_registro" class="form-control"
                            autocomplete="new-email">
                    </div>

                    <div class="contenido">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password_registro" class="form-control"
                            autocomplete="new-password">
                    </div>

                    <div class="contenido">
                        <label for="password">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation_registro"
                            class="form-control" autocomplete="new-password">
                    </div>

                    <div class="contenido mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
