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
                    <h5 class="text-primary"><b>Datos Personales</b></h5>
                    <hr>
                    <!--  <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Codigo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly id="codigo" name="codigo"
                                placeholder="AUTOGENERADO">
                        </div>
                    </div> -->
                    <div class="row mb-2">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Ruta<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <select id="ruta" name="ruta" class="form-select">
                                <option selected>Seleccionar Ruta</option>
                                <!-- <option>...</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Propietario<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Direcci&ograve;n<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="text" id="direccion" name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Identificacion / Nit<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="text" id="identificacion" name="identificacion" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Nombre Tienda<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="text" id="nombre_tienda" name="nombre_tienda" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Telefono<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="text" id="telefono" name="telefono" class="form-control">
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