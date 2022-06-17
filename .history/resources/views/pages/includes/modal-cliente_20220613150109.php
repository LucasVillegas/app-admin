<!-- Modal Dialog Scrollable -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
    Modal Dialog Scrollable
</button> -->
<div class="modal fade" id="modalDialogScrollable" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                        <label for="inputEmail" class="col-sm-2 col-form-label">Ruta</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Propietario</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Direcci&ograve;n</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Identificacion/Nit</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Nombre Tienda</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                </form>
                <!-- End General Form Elements -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->