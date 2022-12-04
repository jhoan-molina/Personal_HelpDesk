<?php
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket= new Ticket();

    switch($_GET["op"]){
        case "insert":
            $ticket->insert_ticket($_POST["usu_id"],$_POST["cat_id"],$_POST["tick_titulo"],$_POST["tick_descrip"]);
        break;
        case "update":
            $ticket->update_ticket($_POST["tick_id"]);
            $ticket->insert_ticketdetalle_cerrar($_POST["tick_id"],$_POST["usu_id"]);
        break;
        case "listar_x_usu":
            //trae el id del usuario 
            $datos=$ticket->listar_ticket_x_usu($_POST["usu_id"]);
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];
                //evalua el estado del ticket
                if($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
                // da el formato del la hora de creación
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                // le da la foorma al boton de visualizar el detalle del ticket 
                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');" id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "listar":
            $datos=$ticket->listar_ticket();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];
                //evalua el estado del ticket
                if($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
                // da el formato del la hora de creación
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                // le da la foorma al boton de visualizar el detalle del ticket 
                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');" id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "listardetalle":
            $datos = $ticket->listar_ticketdetalle_x_ticket($_POST["tick_id"]);
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <!--Damos el formato de la fecha que esta en el lado izquierdo
                                    esta fecha es traida de la misma base de datos-->
                                    <?php echo date("d/m/Y", strtotime($row["fech_crea"])) ?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user">
                                        <div class="activity-line-item-user-photo">
                                            <a href="#">
                                                <!--Ubica la foto en el espacio de cada cuadro de dialogo-->
                                                <img src="../../public/<?php echo $row['rol_id'] ?>.jpg" alt="">
                                            </a>
                                        </div>
                                        <!--Asigna el nombre del usuario cual es traido de la BD-->
                                        <div class="activity-line-item-user-name"><?php echo $row['usu_nom'].' '.$row['usu_ape']; ?></div>
                                        <div class="activity-line-item-user-status">
                                            <?php 

                                                if($row['rol_id']==1){
                                                    echo 'Usuario';
                                                }else{
                                                    echo 'Soporte';
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"])) ?></div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p>
                                                    <?php echo $row["tickd_descrip"]; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                    <!--<section class="activity-line-action">
                                        <div class="time">10:40 AM</div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
                                                <ul class="meta">
                                                    <li><a href="#">5 Comments</a></li>
                                                    <li><a href="#">1 Likes</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </section>-->
                                </div>
				        </article>
                        <?php
                    }
                ?>
                
            <?php
        break;
        case "mostrar":
            $datos = $ticket->listar_ticketdetalle_x_id($_POST["tick_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["tick_id"] = $row["tick_id"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["cat_id"] = $row["cat_id"];
                    $output["tick_titulo"] = $row["tick_titulo"];
                    $output["tick_titulo"] = $row["tick_titulo"];
                    $output["tick_descrip"] = $row["tick_descrip"];
                    if($row["tick_estado"]=="Abierto"){
                        $output["tick_estado"] = '<span class="label label-pill label-success">Abierto</span>';
                    }else{
                        $output["tick_estado"] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }
                    $output["tick_estado_texto"] = $row["tick_estado"];
                    $output["fech_crea"] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["cat_nom"] = $row["cat_nom"];
                }
                echo json_encode($output);
            }
        break;
        case "insertdetalle":
            $ticket->insert_ticketdetalle($_POST["tick_id"],$_POST["usu_id"],$_POST["tickd_descrip"]);
        break;
        case "total":
            $datos = $ticket->get_ticket_total();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        case "totalabierto":
            $datos = $ticket->get_ticket_totalabierto();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        case "totalcerrado":
            $datos = $ticket->get_ticket_totalcerrado();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
    }

?> 