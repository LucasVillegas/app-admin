<div class="pagetitle">
    <h1 class="mb-2">Categorias</h1>
    <div class="row">
        <div class="col-10">
            <div class="input-group mb-2">
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
    <!--     <div class="card" style="height: 60px;border-radius:5px;margin-top:-25px">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-2">
                    <form class="form-edit">
                        <button type="submit" class="btn btn-outline-warning btn-sm" class="btn-edit"><i
                                class="bi bi-pencil-square"></i>
                            <input type="hidden" class="id_categorias">

                        </button>
                    </form>
                </div>

                <div class="col-10" style="margin-left: -10px;">
                    <span class="nombre-categoria">nombre_categoria</span>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-10">
            <h6 class="nombre-categoria" style="font-size:13px;">nombre_categoria</h6>
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
                                <input type="hidden" class="id_categorias">
                            </button>
                        </form>

                        <form class="form-delete">
                            <button type="submit" class="dropdown-item btn text-danger btn-sm" class="btn-edit"><i
                                    class="bi bi-trash"></i> Eliminar
                                <input type="hidden" class="id_categorias">
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

<?php include_once("includes/modal-categoria.php"); ?>
<script src="<?php echo SERVER_SCRIPT_CATEGORIAS; ?>index.js" type="module"></script>