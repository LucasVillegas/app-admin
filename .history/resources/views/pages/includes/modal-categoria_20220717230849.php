<!-- Modal Dialog Scrollable -->
<div class="modal fade" id="Modal-Edit-Categoria" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST" id="form-save">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-2">
                        <label for="inputText" class="col-sm-2 col-form-label">Nombre Categoria<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="categoria" name="categoria" class="form-control"
                                placeholder="Nombre Categoria">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i> Salir</button>
                <!-- <form id="form-save"></form> -->
                <button type="submit" class="btn btn-primary btn-sm btn-save"><i class="bi bi-save"></i>
                    Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->