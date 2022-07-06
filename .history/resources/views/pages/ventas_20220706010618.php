<div class="pagetitle">
    <h1 class="mb-2">Ventas</h1>
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" name="buscar" id="buscar" placeholder="Buscar Venta" class="form-control"
                    autocomplete="off">
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div id="lista-general-ventas">
        <!-- Contenido JavaScript -->
    </div>
</div>

<template id="movimiento">
    <div class="row">
        <div class="col-10">
            <h6 class="fecha" style="font-size:12px;"><b>dia</b></h6>
            <h6 class="text-muted factura" style="font-size:12px;margin-top:-8px;">factura</h6>
            <h6 class="tienda" style="margin-top:-8px;font-size:12px">tienda</h6>
            <h6 class="total" style="margin-top:-8px;font-size:12px">total</h6>
            <h6 class="estado" style="margin-top:-15px;font-size:12px">estado</h6>
        </div>

        <!-- <div class="col-3">
            <h6 class="estado">estado</h6>
        </div> -->

        <div class="col-2">
            <div class="d-flex justify-content-end">
                <div class="btn-group">
                    <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <form class="form-edit">
                            <button type="submit" class="dropdown-item btn text-warning btn-sm" class="btn-edit"><i
                                    class="bi bi-pencil-square"></i> Editar
                                <input type="hidden" class="id_dias_ruta">
                            </button>
                        </form>
                        <form class="form-delete">
                            <button type="submit" class="dropdown-item btn text-danger btn-sm" class="btn-edit"><i
                                    class="bi bi-trash"></i> Eliminar
                                <input type="hidden" class="id_dias_ruta" id="id_delete">
                            </button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-1">
</template>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-dias.php"); ?>
<script src="<?php echo SERVER_SCRIPT_VENTAS; ?>index.js" type="module"></script>