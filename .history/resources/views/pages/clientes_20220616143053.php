<div class="pagetitle">
    <h1 class="mb-2">Clientes</h1>
    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente" class="form-control"
            autocomplete="off">
        <span>
            <form id="form-opne-modal">
                <button type="submit" class="btn btn-success btn-add-cliente" id="btn-add-cliente"><i
                        class="bi bi-person-plus"></i></button>
            </form>
        </span>

    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-lg-12">
        <div id="lista-general-clientes">
            <!-- Contenido JavaScript -->
        </div>
    </div>
</div>

<template id="movimiento">
    <div class="card" style="height: 60px;border-radius:5px;margin-top:-25px">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-2">
                    <!--  <input type="button" class="btn btn-outline-warning btn-sm" id="btn-edit"> -->
                    <form id="form-edit">
                        <button type="submit" class="btn btn-outline-warning btn-sm" id="btn-edit" class="btn-edit"><i
                                class="bi bi-pencil-square"></i>
                            <input type="hidden" class="id_cliente">
                        </button>
                    </form>

                </div>

                <div class="col-10">
                    <span class="nombre-cliente">${c.nombre_cliente.toLowerCase()}</span>
                    <br />
                    <span class="telefono-cliente">${c.telefono_cliente.toLowerCase()}</span>
                </div>
            </div>
        </div>
    </div>
</template>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-cliente.php"); ?>

<script src="<?php echo SERVERSCRIPT_CLIENTES; ?>index.js" type="module"></script>