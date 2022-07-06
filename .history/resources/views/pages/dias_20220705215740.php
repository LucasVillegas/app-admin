<div class="pagetitle">
    <h1 class="mb-2">Dias Rutas</h1>
    <div class="row">
        <div class="col-10">
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" name="buscar" id="buscar" placeholder="Buscar Dia" class="form-control"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-2" style="margin-left: -12px;">
            <form id="form-opne-modal">
                <button type="submit" class="btn btn-success btn-add-dia" id="btn-add-dia">
                    <i class="bi bi-plus"></i></button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div id="lista-general-dias-rutas">
        <!-- Contenido JavaScript -->
    </div>
</div>

<template id="movimiento">
    <div class="row">
        <div class="col-10">
            <h6 class="nombre-dia" style="font-size:13px;"> <b>dia</b> </h6>
            <h6 class="text-muted nombre-ruta" style="font-size:12px;margin-top:-8px;">nombre_ruta</h6>
            <h6 class="estado" style="margin-top:-8px;">estado</h6>
        </div>

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
<script src="<?php echo SERVER_SCRIPT_DIAS_RUTAS; ?>index.js" type="module"></script>