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
                <div class="col-12">
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
                    <h6 style="font-size:12px;" id="obs"></h6>

                    <hr class="my-1">

                    <div class="col-12 bg-Light">
                        <h6 style="font-size:12px;">Subtotal</h6>
                        <h6 style="font-size:12px;">Impuestos</h6>
                        <h6 style="font-size:12px;">Total</h6>
                    </div>

                    <div class="col text-end ml-3" style="margin-top:-70px">
                        <h6 style="font-size:12px;" id="subtotal"><b></b></h6>
                        <h6 style="font-size:12px;" id="iva"><b></b></h6>
                        <h6 style="font-size:12px;" id="total"><b></b></h6>
                    </div>
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