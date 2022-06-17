<div class="pagetitle">
    <div class="input-group mb-5">
        <!-- <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span> -->
        <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente" class="form-control"
            autocomplete="off">
        <button type="button" class="btn btn-success btn-add-cliente" id="btn-add-cliente"><i
                class="bi bi-person-plus"></i></button>


    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-lg-12">
        <div id="lista-general-clientes">
            <!-- Contenido JavaScript -->
            <div class="card" style="height: 60px;border-radius:5px;margin-top:-25px">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-warning btn-sm" id="btn-edit"
                                class="btn-edit"><i class="bi bi-pencil-square"></i>
                                <input type="hidden" class="id_cliente" value="${c.cliente_id}">
                            </button>
                        </div>

                        <div class="col-10">
                            <span>${c.nombre_cliente.toLowerCase()}</span>
                            <br />
                            <span>${c.telefono_cliente.toLowerCase()}</span>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-cliente.php"); ?>

<script src="<?php echo SERVERSCRIPT_CLIENTES; ?>index.js" type="module"></script>