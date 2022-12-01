<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>JhoanM</>::Home</title>
    </head>

    <body class="with-side-menu">
        <?php require_once("../MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay"></div>
        <!--Trae el menu en relacion al rol que se tenga-->
        <?php require_once("../MainNav/nav.php"); ?>

        <div class="page-content">
            <div class="container-fluid">
                
            </div>
            <!--.container-fluid-->
        </div>
        <!--.page-content-->
        <!--Trae los script que se necesite, lo hace mediante la ruta-->
        <?php require_once("../Mainjs/js.php"); ?>
        <script type="text/Javascript" src="home.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: " . Conectar::ruta() . "index.php");
}
?>