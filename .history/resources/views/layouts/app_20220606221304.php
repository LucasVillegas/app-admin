<?php session_start(['name' => 'DISTRI']);  ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo COMPANY; ?></title>
    <link href="<?php echo SERVERVENDOR; ?>select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo SERVERVENDOR; ?>nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SERVERVENDOR; ?>@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Alertas -->
    <script src="<?php echo SERVER_SCRIPT_ALERTAS; ?>alertas.js"></script>
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo SERVERASSETS; ?>css/argon.css?v=1.2.0" type="text/css">

    <script src="<?php echo SERVERVENDOR; ?>jquery/dist/jquery.min.js"></script>
</head>

<body style="background-color:#fff">

    <?php
    require_once "./app/Controllers/viewsControllers.php";
    $vt = new  viewsControllers();
    $vistasR = $vt->obtener_vistas_controlador();

    if ($vistasR == "login" || $vistasR == "404") :
        if ($vistasR == "login") {
            include_once "./resources/views/auth/login.php";
        } else {
            include_once "./resources/views/pages/404.php";
        }
    else :
        require_once './app/helpers/herlpers.php';
        //$lc = new helpers();
        if (!isset($_SESSION['token_dis']) || !isset($_SESSION['usuario_dis'])) {
            session_unset();
            echo $lc->forzar_cierre_sesion_controlador();
        }
    ?>

    <!-- Main content -->
    <?php require_once $vistasR; ?>
    <!-- End Main content -->
    <!-- navbar Footer -->
    <?php require_once "./resources/views/layouts/partials/footer.php" ?>
    <!-- end navbar Footer-->
    <?php endif; ?>



    <!-- Optional JavaScript -->
    <!-- Core -->
    <script src="<?php echo SERVERVENDOR; ?>jquery/dist/jquery.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>select2/dist/js/select2.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>js-cookie/js.cookie.js"></script>
    <!-- Argon JS -->
    <script src="<?php echo SERVERASSETS; ?>js/argon.js?v=1.2.0"></script>

</body>

</html>