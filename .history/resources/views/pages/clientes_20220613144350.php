<div class="pagetitle">
    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente" class="form-control"
            autocomplete="off">
    </div>

    <div class="input-group mb-5">
        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-cliente.php"); ?>

<script src="<?php echo SERVERSCRIPT_CLIENTES; ?>index.js" type="module"></script>