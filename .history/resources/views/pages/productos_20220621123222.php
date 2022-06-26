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
    <div class="col-12">
        <div id="lista-general-productos">
            <!-- Contenido JavaScript -->
        </div>
    </div>
</div>

<template id="movimiento">
    <div class="row">
        <div class="d-flex justify-content-end">
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="my-1 amount">
                    <a href="javascript:void(0);" class="restar btn-restar text-center" id="restar">
                        <i class="fas fa-minus fa-sm"></i>
                    </a>

                    <div class="valorcarrito">
                        <input type="number"
                            style="width: 55px;border: 1px solid #000000 !important; height: 30px;font-size: 15px"
                            min="1" value="1" class="cantidad" maxlength="4"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>

                    <a href="javascript:void(0);" class="sumar btn-sumar text-center" id="sumar"> <i
                            class="fas fa-plus fa-sm"></i> </a>
                </div>
            </div>
            <div class="col-6 mt-2">
                <form class="form-edit">
                    <button type="submit" class="btn text-warning btn-sm" class="btn-edit"><i
                            class="bi bi-pencil-square"></i>
                        <input type="hidden" class="id_producto">
                    </button>
                </form>
            </div>
        </div>
        <div class="col-2">
            <img src="public/img/caja.png" alt="Opss..!" width="60px" height="60px">
            <span class="estado">estado</span>
        </div>
        <div class="col-10">
            <h6 class="nombre-producto" style="font-size:13px">nombre_producto</h6>
            <h6 class="text-dark nombre-unidad">codigo . p.nombre_unidad</h6>
        </div>

    </div>
    <hr>
    <!--     <div class="row">
        <div class="col-11">
            <h6 class="nombre-producto">nombre_producto</h6>
            <p class="nombre-unidad text-secondary">descripcion_unidad</p>
        </div>

        <div class="col-1">
            <form class="form-edit">
                <button type="submit" class="btn text-warning btn-sm" class="btn-edit"><i
                        class="bi bi-pencil-square"></i>
                    <input type="hidden" class="id_producto">
                </button>
            </form>
        </div>
    </div>
    <hr> -->
    <!--     <div class="card" style="height: 80px;border-radius:5px;margin-top:-25px">
        <div class="card-body p-1">
            
        </div>
    </div> -->
</template>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-productos.php"); ?>
<script src="<?php echo SERVER_SCRIPT_PRODUCTOS; ?>index.js" type="module"></script>