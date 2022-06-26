<!-- Modal Dialog Scrollable -->
<div class="modal " id="Modal-Edit-Productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Codigo<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" style="border:none;" readonly class="form-control input-lg" id="codigo"
                                name="codigo">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Seleccionar Categoria<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select name="categoria" id="categoria" class="form-control input-lg" style="width:100%;">
                                <option value="#">Seleccionar Categoria</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Seleccionar Unidad<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select name="unidad" id="unidad" class="form-control input-lg" style="width:100%;">
                                <option value="#">Seleccionar Unidad</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Descripción<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input-lg" id="descripcion"
                                placeholder="Ingresar descripción" name="descripcion">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Precio Compra<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra"
                                placeholder="Precio Compra">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Precio Venta<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nuevoPrecioPorcentaje"
                                name="nuevoPrecioPorcentaje" placeholder="Precio Venta">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Cantidad<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cantidad" name="cantidad"
                                placeholder="Cantidad" value="0">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Porcentaje<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" name="porcentaje" id="porcentaje"
                                class="form-control input-lg nuevoPorcentaje" min="0" value="40">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Precio Total<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input-lg" placeholder="Ingrese Precio Venta"
                                name="preciototal" id="preciototal">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="inputText" class="col-sm-2 col-form-label">Foto<span
                                class="badge badge-pill text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="file" name="foto" id="foto" class="form-control input-lg">
                        </div>
                    </div>


                </form>
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