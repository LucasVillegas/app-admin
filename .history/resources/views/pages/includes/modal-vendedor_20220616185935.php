<!-- Modal Dialog Scrollable -->

<div class="modal fade" id="Modal-Edit-Vendedor" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos Vendedores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- General Form Elements -->
                <form method="POST">
                    <input type="hidden" id="id" name="id">
                    <div id="datos-personales">
                        <h5 class="text-primary"><b>Datos Personales</b></h5>
                        <hr class="my-1">
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Identificación<span
                                    class="badge badge-pill text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="identificacion" name="identificacion" class="form-control"
                                    placeholder="identificacion">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Nombres<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="text" id="nombres" name="nombres" class="form-control"
                                    placeholder="Nombres">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Apellidos<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="text" id="apellidos" name="apellidos" class="form-control"
                                    placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Telefono<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="text" id="telefono" name="telefono" class="form-control"
                                    placeholder="Telefono">
                            </div>
                        </div>
                    </div>

                    <div id="datos-usuario">
                        <h5 class="text-primary"><b>Datos Usuario</b></h5>
                        <hr class="my-1">
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Usuario<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="text" id="usuario" name="usuario" class="form-control"
                                    placeholder="Usuario">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Correo<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Clave<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Clave">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputText" class="col-sm-2 col-form-label">Confirmar Clave<span
                                    class="badge badge-pill text-danger">*</span></label></label>
                            <div class="col-sm-10">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Confirmar Clave">
                            </div>
                        </div>
                    </div>

                </form>

                <!-- End General Form Elements -->
                <div id="acciones" class="d-flex justify-content-center" style="display: none">
                    <form id="form-bloq">
                        <button type="submit" id="btn-bloq" class="btn btn-warning btn-sm btn-bloq text-white"><i
                                class="bi bi-slash-square"></i> Bloquear</button>
                    </form>

                    <form id="form-activ">
                        <button type="submit" id="btn-activ" class="btn btn-dark btn-sm btn-activ text-white"
                            style="display: none"><i class="bi bi-arrow-counterclockwise"></i> Activar</button>
                    </form>
                    <form id="form-delete">
                        <button type="submit" class="btn btn-danger btn-sm btn-delete"><i class="bi bi-trash"></i>
                            Eliminar</button>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i> Salir</button>
                <form id="form-save">
                    <button type="submit" class="btn btn-primary btn-sm btn-save"><i class="bi bi-save"></i>
                        Guardar</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->