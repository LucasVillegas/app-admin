<div class="pagetitle">
    <h1 class="mb-2">Prductos</h1>
    <div class="row">
        <div class="col-10">
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" name="buscar" id="buscar" placeholder="Buscar Producto" class="form-control"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-2" style="margin-left: -12px;">
            <form id="form-opne-modal">
                <button type="submit" class="btn btn-success btn-add-vendedor" id="btn-add-vendedor">
                    <i class="bi bi-plus"></i></button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-lg-12">
        <div id="lista-general-productos">
            <!-- Contenido JavaScript -->
        </div>
    </div>
</div>

<template id="movimiento">
    <div class="card" style="height: 80px;border-radius:5px;margin-top:-25px">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-1">
                    <form class="form-edit">
                        <button type="submit" class="btn btn-outline-warning btn-sm" class="btn-edit"><i
                                class="bi bi-pencil-square"></i>
                            <input type="hidden" class="id_producto">
                        </button>
                    </form>
                </div>

                <div class="col-11" style="margin-left: 12px;">
                    <span class="nombre-producto">nombre_producto</span>
                    <br />
                    <span class="nombre-unidad text-secondary">descripcion_unidad</span>
                </div>
            </div>
        </div>
    </div>
</template>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-productos.php"); ?>
<script src="<?php echo SERVER_SCRIPT_PRODUCTOS; ?>index.js" type="module"></script>