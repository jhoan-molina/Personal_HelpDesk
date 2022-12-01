<header class="site-header">
    <div class="container-fluid">

        <a href="../../view/home/index.php" class="site-logo">
            <img class="hidden-md-down" src="../../public/img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="../../public/img/logo-2-mob.png" alt="">
        </a>

        <!--Menu desplegable-->
        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <!--<span>toggle menu</span>-->
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/avatar-2-64.png" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Ajustes</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <!--Trae de la vista el logout quien destruye la sesión y redirecciona al login-->
                            <a class="dropdown-item" href="../../view/Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-right-overlay"></div>

                <input type="hidden" id="user_idx" value="<?php echo $_SESSION['usu_id'] ?>"><!--ID del Usuario-->
                <input type="hidden" id="rol_idx" value="<?php echo $_SESSION['rol_id'] ?>"><!--Rol del Usuario-->
                <div class="dropdown dropdown-typical">
                    <a href="#" class="dropdown-toggle no-arr">
                        <span class="font-icon font-icon-user"></span>
                        <!--Muestra en el header el nombre y el apellido capturado del form-->
                        <span class="lblcontactonomx"><?php echo $_SESSION["usu_nom"]?> <?php echo $_SESSION["usu_ape"] ?></span>
                    </a>
                </div>
                <!--.site-header-shown-->

                <!--.site-header-collapsed-->
            </div>
            <!--site-header-content-in-->
        </div>
        <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
</header>
<!--.site-header-->