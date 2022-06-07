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

    <!-- Vendor CSS Files -->
    <link href="<?php echo SERVERVENDOR; ?>jbootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jbootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jboxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jquill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jquill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jremixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo SERVERVENDOR; ?>jsimple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo SERVERASSETS; ?>css/style.css" rel="stylesheet">

    <!-- Alertas -->
    <!-- <script src="<?php echo SERVER_SCRIPT_ALERTAS; ?>alertas.js"></script>

    <script src="<?php echo SERVERVENDOR; ?>jquery/dist/jquery.min.js"></script> -->
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
    <!--  <script src="<?php echo SERVERVENDOR; ?>jquery/dist/jquery.min.js"></script> -->

    <!-- Vendor JS Files -->
    <script src="<?php echo SERVERVENDOR; ?>japexcharts/apexcharts.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jbootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jchart.js/chart.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jecharts/echarts.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jquill/quill.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jsimple-datatables/simple-datatables.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jtinymce/tinymce.min.js"></script>
    <script src="<?php echo SERVERVENDOR; ?>jphp-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="SERVERASSETSjs/main.js"></script>

</body>

</html>