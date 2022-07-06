<!-- Modal Dialog Scrollable -->
<div class="modal fade" id="Modal-Detalle-Venta" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- General Form Elements -->
                <div id="lista-detalle-productos">

                </div>
                <h6 class="nombre-codigo">${v.nombre_producto} - ${codigo}</h6>
                <h6 class="precio text-dark" style="margin-top:-10px;">$ ${formatNum(v.precio)}/${v.nombre_unidad}</h6>
                <h6 class="cantidad text-center" style="margin-top:-20px;">X${v.cantidad}</h6>
                <h5 class="total-producto text-right" style="margin-top:-25px;">$ ${formatNum(v.precio * v.cantidad)}
                </h5>
                <hr class="my-1">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->

<template id="detalle-producto">
    <div class="row">
        <div class="col-10">
            <h6 class="fecha" style="font-size:12px;"><b>dia</b></h6>
            <h6 class="text-muted factura" style="font-size:12px;margin-top:-8px;">factura</h6>
            <h6 class="tienda" style="margin-top:-8px;font-size:12px">tienda</h6>
            <h6 class="total" style="margin-top:-8px;font-size:12px">total</h6>
            <h6 class="estado" style="margin-top:-10px;">estado</h6>
        </div>

        <div class="col-2">
            <div class="d-flex justify-content-end">
                <div class="btn-group">
                    <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <form class="form-open-modal">
                            <button type="submit" class="dropdown-item btn text-info btn-sm" class="btn-edit"><i
                                    class="bi bi-eye"></i> Ver
                                <input type="hidden" class="id_venta">
                            </button>
                        </form>
                        <form class="form-delete">
                            <button type="submit" class="dropdown-item btn text-danger btn-sm" class="btn-edit"><i
                                    class="bi bi-trash"></i> Eliminar
                                <input type="hidden" class="id_venta">
                            </button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-1">
</template>