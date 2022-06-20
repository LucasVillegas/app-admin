<div class="pagetitle">
    <h1 class="mb-2">Categorias</h1>
    <div class="row">
        <div class="col-10">
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" name="buscar" id="buscar" placeholder="Buscar Categoria" class="form-control"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-2" style="margin-left: -12px;">
            <form id="form-opne-modal">
                <button type="submit" class="btn btn-success btn-add-vendedor" id="btn-add-vendedor"><i
                        class="bi bi-plus"></i></button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Title -->


<div class="row">
    <div class="col-lg-12">
        <div id="lista-general-categorias">
            <!-- Contenido JavaScript -->
        </div>
    </div>
</div>

<template id="movimiento">
    <div class="card" style="height: 60px;border-radius:5px;margin-top:-25px">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-2">
                    <form class="form-edit">
                        <button type="submit" class="btn btn-outline-warning btn-sm" class="btn-edit"><i
                                class="bi bi-pencil-square"></i>
                            <input type="hidden" class="id_vendedores">

                        </button>
                    </form>
                </div>

                <div class="col-2" style="margin-left: -20px;">
                    <form class="form-edit-user">
                        <button type="submit" class="btn btn-outline-warning btn-sm" class="btn-edit"><i
                                class="bi bi-person-lines-fill"></i>
                            <input type="hidden" class="id_vendedores">
                        </button>
                    </form>
                </div>

                <div class="col-8" style="margin-left: -10px;">
                    <span class="nombre-vendedor">nombre_vendedo</span>
                    <br />
                    <span class="telefono-vendedor">telefono_vendedor</span>
                </div>
            </div>
        </div>
    </div>
</template>





<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-categoria.php"); ?>
<script src="<?php echo SERVER_SCRIPT_CATEGORIAS; ?>index.js" type="module"></script>