<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>JhoanM</>::Mantenimiento Usuario</title>
    </head>

    <body class="with-side-menu">
        <?php require_once("../MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay"></div>
        <!--Trae la navegación de la barra donde se encuentra lo que puede realizar la app web-->
        <?php require_once("../MainNav/nav.php"); ?>

        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <!--Titulo de la sección-->
                                <h3>Mantenimiento Usuario</h3>
                                <!--Menú horizontal, muestra donde esta ubicado dicha interfaz y da opcion de volver a la
                                interfaz anterior-->
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../home/index.php">Home</a></li>
                                    <li class="active">Mantenimiento Usuario</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <!--Aplicando la clase para traer una especie de seccion en la cual trae el formato de la tabla-->
            <div class="box-typical box-typical-padding">
                <!--Aplica las clases para traer los datos desde la base de datos y dar el formato-->
                <table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th style="width: 5%;">Nro. Ticket</th>
                            <th style="width: 15%;">Categoría</th>
                            <th class="d-none d-sm-table-cell" style="width: 40%;">Titulo</th>
                            <th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Creación</th>
                            <th class="text-center" style="width: 5%;"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!--.container-fluid-->
        </div>
        <!--.page-content-->
        <?php require_once("../Mainjs/js.php"); ?>
        <script type="text/Javascript" src="mntusuario.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: " . Conectar::ruta() . "index.php");
}
?>