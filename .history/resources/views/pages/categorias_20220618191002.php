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


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<?php include_once("includes/modal-vendedor.php"); ?>
<script src="<?php echo SERVER_SCRIPT_VENDEDORES; ?>index.js" type="module"></script>