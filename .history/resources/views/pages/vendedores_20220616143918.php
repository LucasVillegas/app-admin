<div class="pagetitle">
    <h1 class="mb-2">Vendedores</h1>
    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input type="text" name="buscar" id="buscar" placeholder="Buscar Vendedor" class="form-control"
            autocomplete="off">
        <span>
            <form id="form-opne-modal">
                <button type="submit" class="btn btn-success btn-add-vendedor" id="btn-add-vendedor"><i
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


<script src="<?php echo SERVER_SCRIPT_VENDEDORES; ?>index.js" type="module"></script>