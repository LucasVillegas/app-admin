<!-- Modal Rutas -->
<div class="modal fade" id="ModalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i class="fas fa-tags"></i> Productos
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="unidad" id="unidad" class="form-control input-lg" style="width:100%;">
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-code"></i></span>
                                </div>
                                <input type="text" style="border:none;" readonly class="form-control input-lg"
                                    id="codigo" name="codigo">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                                </div>
                                <input type="text" class="form-control input-lg" id="descripcion"
                                    placeholder="Ingresar descripción" name="descripcion">
                            </div>
                        </div>

                        <!-- <div class="col-sm-12">
                            <div class="form-group">
                                <select name="proveedor" id="proveedor" class="form-control input-lg"
                                    style="width:100%">
                                </select>
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                                </div>
                                <input type="number" class="form-control" id="nuevoPrecioCompra"
                                    name="nuevoPrecioCompra" placeholder="Precio Compra">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>
                                </div>
                                <input type="number" class="form-control" id="nuevoPrecioPorcentaje"
                                    name="nuevoPrecioPorcentaje" placeholder="Precio Venta">
                            </div>
                        </div>

                        <!-- CANTIDAD DE PRODUCTO -->
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-boxes"></i></span>
                                </div>
                                <input type="number" class="form-control" id="cantidad" name="cantidad"
                                    placeholder="Cantidad" value="0">
                            </div>
                        </div>

                        <div class="col-sm-2"></div>

                        <!-- ENTRADA PARA PORCENTAJE -->
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" name="porcentaje" id="porcentaje"
                                    class="form-control input-lg nuevoPorcentaje" min="0" value="40">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    <!--  <span class="input-group-addon"></span> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control input-lg" placeholder="Ingrese Precio Venta"
                                    name="preciototal" id="preciototal">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
            </form>
        </div>
    </div>
</div>