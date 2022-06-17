<!-- Modal Dialog Scrollable -->

<div class="modal fade" id="modalDialogScrollable" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Campos<span class="text-danger"> * </span>Obligatorios
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <!-- General Form Elements -->
                <form>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Codigo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly id="codigo" name="codigo"
                                placeholder="AUTOGENERADO">
                        </div>
                    </div>
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
                        <label for="inputPassword" class="col-sm-2 col-form-label">Propietario<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="password" id="nombre_cliente" name="nombre_cliente" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Direcci&ograve;n<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="number" id="direccion" name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Identificacion / Nit<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Nombre Tienda<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Telefono<span
                                class="badge badge-pill text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                </form>
                <!-- End General Form Elements -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i> Salir</button>
                <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->