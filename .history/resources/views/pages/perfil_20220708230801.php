<div class="pagetitle">
    <h1 class="mb-2">Mi Perfil</h1>
</div>
<!-- End Page Title -->

<div class="container mt-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <label for="" class="text-muted">Identificacion:<?php echo $_SESSION['identificacion_dis']; ?></label>
            <h5 class="mb-2"><?php echo $_SESSION['identificacion_dis']; ?></h5>
        </li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
    </ul>
    <div class="row">
        <div class="col-12">

            <label for="" class="text-muted">Nombre Completo</label>
            <h2 class="mb-2">
                <?php echo $_SESSION['nombre_dis']; ?> <?php echo $_SESSION['apellido_dis']; ?></h2>
            <label for="" class="text-muted">Teléfono</label>
            <h2 class="mb-2"><?php echo $_SESSION['telefono_dis']; ?></h2>
            <label for="" class="text-muted">Estado</label>
            <h2 class="mb-5"><?php if ($_SESSION['estado_persona_dis'] == 1) {
                                    echo "<span class='badge badge-success'>ACTIVO</span>";
                                } ?></h2>
            <div class="d-flex justify-content-center">
                <a href="<?php echo SERVERURL; ?>logout" class="btn btn-default"><i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>