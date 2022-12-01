<?php
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria= new Categoria();

    switch($_GET["op"]){
        case "combo":
            $datos = $categoria->get_categoria();
            if(is_array($datos)==true and count($datos)>0){
                //Trae del arreglo el id como valor y el nombre para el combo box
                foreach($datos as $row){
                    $html.="<option value='".$row['cat_id']."'>".$row['cat_nom']."</option>";
                }
                echo $html;
            }
        break;
    }

?>