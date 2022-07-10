<div class="pagetitle">
    <h1 class="mb-2">Mi Perfil</h1>
</div>
<!-- End Page Title -->

<div class="container mt-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <label>Identificacion: <?php echo $_SESSION['identificacion_dis']; ?></label>
        </li>
        <li class="list-group-item">
            <label>Nombre: <?php echo $_SESSION['nombre_dis']; ?> <?php echo $_SESSION['apellido_dis']; ?></label>
        </li>
        <li class="list-group-item">
            <label>Teléfono: <?php echo $_SESSION['telefono_dis']; ?> </label>
        </li>
        <li class="list-group-item">
            <label>Estado: <?php if ($_SESSION['estado_persona_dis'] == 1) {
                                echo "<span class='badge bg-success'>ACTIVO</span>";
                            } ?></label>
        </li>
        <li class="list-group-item">
            <div class="d-flex justify-content-center">
                <a href="<?php echo SERVERURL; ?>logout" class="btn btn-default"><i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión</a>
            </div>
        </li>
    </ul>
    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div>