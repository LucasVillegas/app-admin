<?php session_start(['name' => 'DISTRI']);  ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo COMPANY; ?></title>
    <link href="<?php echo SERVERVENDOR; ?>select2/dist/css/select2.min.css" rel="stylesheet">
    <style>
    .fonticon {
        font-size: 40px;
        color: #172b4d;
    }

    .iconmenu {
        font-size: 30px;
        color: #172b4d;
    }

    .ico {
        position: relative;
    }

    .noti {
        position: absolute;
        text-align: center;
        margin-left: 18px;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #f5365c;
        padding: 0px 1px;
        border-radius: 50%;
        color: white;
    }

    .restar,
    .sumar {
        padding-left: 1px;
        color: #000;
        /*background-color: #32325d;*/
        border-width: 1px;
        border-style: solid;
        border-color: #000;
        height: 31.5px;
        width: 30px;
        font-size: 18px;
        float: left;
        text-decoration: none;
        cursor: pointer;
    }

    .restar {
        border-bottom-left-radius: 50%;
        border-top-left-radius: 50%;
        /* border-radius: 50%; */
    }

    .sumar {
        border-bottom-right-radius: 50%;
        border-top-right-radius: 50%;
        /* border-radius: 50%; */
    }

    .restar:hover,
    .sumar:hover {
        background-color: #32325d;
        color: #FFF;
    }

    .valorcarrito {
        height: 30px;
        width: 30px;
        text-align: center;
        float: left;
        font-size: 20px;
    }

    .filtro {
        display: none;
    }

    /*.select2-container .select2-selection--single,
    .select2-container--default .select2-search--dropdown .select2-search__field,
    .select2-container--default .select2-selection--multiple,
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        padding-bottom: 8px !important;
    } */

    .footer {
        position: fixed;
        bottom: -3px;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 50px;
        /* background-color: #f5365c !important; */
    }
    </style>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
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
        $lc = new helpers();
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