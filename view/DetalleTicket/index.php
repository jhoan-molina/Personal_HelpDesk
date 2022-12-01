<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html>
	<!--Trae de la ruta main head la rutas link que se necesiten para el front,
	el responsive de la página y el tipo de informacion con el lenguaje-->
    <?php require_once("../MainHead/head.php"); ?>
    <title>JhoanM</>::Detalle Ticket</title>
    </head>

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay"></div>
        <?php require_once("../MainNav/nav.php"); ?>

        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
								<!--Titulo de la sección-->
                                <h3 id="lblnomidticket"></h3>
								<div id="lblestado"></div>
								<div class="label label-pill label-primary" id="lblnomusuario"></div>
								<span class="label label-pill label-default" id="lblfechcrea"></span>
								<!--Menú horizontal, muestra donde esta ubicado dicha interfaz y da opcion de volver a la
                                interfaz anterior-->
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../home/index.php">Home</a></li>
									<li><a href="../../view/ConsultarTicket/index.php">Consultar Ticket</a></li>
                                    <li class="active">Detalle Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
					<div class="box-typical box-typical-padding">
						<div class="row">
							<div class="col-lg-6">
								<fieldset class="form-group">
									<!--Almacenar la categotia del ticket-->
									<label class="form-label semibold" for="cat_nom">Categoria</label>
									<input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
								</fieldset>
							</div>
							<div class="col-lg-6">
								<!--Almacenar el titulo del ticket-->
								<fieldset class="form-group">
									<label class="form-label semibold" for="tick_titulo">Titulo</label>
									<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tickd_descripusu">Descripción</label>
									<div class="summernote-theme-3">
										<textarea class="summernote" id="tickd_descripusu" name="tickd_descripusu"></textarea>
									</div>
								</fieldset>
							</div>
						</div>
					</div>

					<section class="activity-line" id="lbldetalle">
					<!--<article class="activity-line-item box-typical">
						<div class="activity-line-date">
							Tuesday<br/>
							sep 9
						</div>
						<header class="activity-line-item-header">
							<div class="activity-line-item-user">
								<div class="activity-line-item-user-photo">
									<a href="#">
										<img src="img/photo-64-2.jpg" alt="">
									</a>
								</div>
								<div class="activity-line-item-user-name">Tim Colins</div>
								<div class="activity-line-item-user-status">Developer, Palo Alto</div>
							</div>
						</header>
						<div class="activity-line-action-list">
							<section class="activity-line-action">
								<div class="time">10:40 AM</div>
								<div class="cont">
									<div class="cont-in">
										<p>Uploaded 3 Images to Daily UI Album</p>
										<ul class="previews">
											<li>
												<a class="fancybox" rel="gall-1" href="img/pic.jpg">																	<img src="http://placehold.it/120x80" alt=""/>
												</a>
											</li>
											<li>
												<a class="fancybox" rel="gall-1" href="img/pic.jpg">																	<img src="http://placehold.it/120x80" alt=""/>
												</a>
											</li>
											<li>
												<a class="fancybox" rel="gall-1" href="img/pic.jpg">																	<img src="http://placehold.it/120x80" alt=""/>
												</a>
											</li>
											<li>
												<a class="fancybox" rel="gall-1" href="img/pic.jpg">																	<img src="http://placehold.it/120x80" alt=""/>
												</a>
											</li>
											<li>
												<a class="fancybox" rel="gall-1" href="img/pic.jpg">																	<img src="http://placehold.it/120x80" alt=""/>
												</a>
											</li>
										</ul>
										<ul class="meta">
											<li><a href="#">5 Comments</a></li>
											<li><a href="#">5 Likes</a></li>
										</ul>
									</div>
								</div>
							</section><
							<section class="activity-line-action">
								<div class="time">10:40 AM</div>
								<div class="cont">
									<div class="cont-in">
										<p>Left a comment to <a href="#">Olga Gozha’s</a> Image</p>
										<div class="tbl img-comment">
											<div class="tbl-row">
												<div class="tbl-cell tbl-cell-img">
													<img src="http://placehold.it/120x80" alt=""/>
												</div>
												<div class="tbl-cell tbl-cell-txt">
													«Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller»
												</div>
											</div>
										</div>
										<ul class="meta">
											<li><a href="#">5 Comments</a></li>
											<li><a href="#">5 Likes</a></li>
										</ul>
									</div>
								</div>
							</section><
							<section class="activity-line-action">
								<div class="time">10:40 AM</div>
								<div class="cont">
									<div class="cont-in">
										<p>Uploaded 3 files</p>
										<ul class="attach-list">
											<li>
												<i class="font-icon font-icon-page"></i>
												<a href="#">example.avi</a>
											</li>
											<li>
												<i class="font-icon font-icon-page"></i>
												<a href="#">activity.psd</a>
											</li>
											<li>
												<i class="font-icon font-icon-page"></i>
												<a href="#">example.psd</a>
											</li>
										</ul>
										<ul class="meta">
											<li><a href="#">5 Comments</a></li>
											<li><a href="#">5 Likes</a></li>
										</ul>
									</div>
								</div>
							</section>
						</div>
					</article>-->
					</section>
					<div class="box-typical box-typical-padding" id="pnldetalle">
						<p>Ingrese su duda o consulta</p>
						<div class="row">
								<!--Input de descripcion
								Se activa esto desde el js de nuevo ticket, y es aqui donde se activa y se muestra en pantalla
								-->
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tickd_descrip">Descripción</label>
									<!--Trae el espacio donde se podra interactuar con el asesor-->
									<div class="summernote-theme-3">
										<textarea class="summernote" id="tickd_descrip" name="tickd_descrip"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
								<button type="button" id="btnCerrarTicket" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
							</div>

						</div>
					</div>	
                    <!--.row-->

                </div>
            </div>

            
            
            <!--.container-fluid-->
        </div>
        <!--.page-content-->
        <?php require_once("../Mainjs/js.php"); ?>
        <script type="text/Javascript" src="detalleticket.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: " . Conectar::ruta() . "index.php");
}
?>