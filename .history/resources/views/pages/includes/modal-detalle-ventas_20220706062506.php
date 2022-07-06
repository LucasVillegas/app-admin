<!-- Modal Dialog Scrollable -->
<div class="modal fade" id="Modal-Detalle-Venta" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <!-- <div id="lista-detalle-productos">

                </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->

<!-- <template id="detalle-producto"></template> -->
<!-- <div class="row"></div> -->
<div class="col-12">
    <!-- <h6 class="nombre-codigo" style="font-size:12px;"><b>nombre_producto-codigo</b></h6>
        <h6 class="precio text-dark" style="font-size:12px;">precio/nombre_unidad</h6>
        <h6 class="cantidad text-center" style="margin-top:-20px;font-size:12px;">Xcantidad</h6>
        <h6 class="total-producto text-end" style="margin-top:-20px;font-size:12px;">precio * cantidad
        </h6>
        <strong>Observación</strong>
        <h6 class="obs" style="font-size:12px;"></h6>
        <hr class="my-1"> -->

    <div id="venta">
        <img src="<?php echo SERVERIMG; ?>loading.png" alt="Cargando..." width="30px" height="30px">
        Esperando Respuesta...
    </div>

    <hr class="my-1">

    <div id="detalle">
        <img src="<?php echo SERVERIMG; ?>loading.png" alt="Cargando..." width="30px" height="30px">
        Esperando Respuesta...
    </div>

    <strong>Observación</strong>
    <h6 id="obs"></h6>

    <hr class="my-1">

    <div class="col-12 bg-secondary">
        <h5>Subtotal</h5>
        <h5>Impuestos</h5>
        <h5>Total</h5>
    </div>

    <div class="col text-right ml-3" style="margin-top:-80px">
        <h5 id="subtotal"></h5>
        <h5 id="iva"></h5>
        <h5 id="total"></h5>
    </div>
</div>