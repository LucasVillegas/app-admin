<!-- Modal Dialog Scrollable -->
<div class="modal fade" id="Modal-Edit-Dias-Rutas" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Nombre Dia<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="nombre_ruta" name="nombre_ruta" class="form-control"
                                placeholder="Nombre Ruta">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Ruta<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select name="vendedor" id="vendedor" class="form-control" style="width:100%">
                                <option value="#">Seleccionar Vendedor</option>
                            </select>
                        </div>
                    </div>
                </form>
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