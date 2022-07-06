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
        <div class="col-12">
            <h6 class="nombre-codigo">${v.nombre_producto} - ${codigo}</h6>
            <h6 class="precio text-dark" style="margin-top:-10px;">$ ${formatNum(v.precio)}/${v.nombre_unidad}</h6>
            <h6 class="cantidad text-center" style="margin-top:-20px;">X${v.cantidad}</h6>
            <h5 class="total-producto text-right" style="margin-top:-25px;">$ ${formatNum(v.precio * v.cantidad)}
            </h5>
            <hr class="my-1">
        </div>
    </div>
</template>