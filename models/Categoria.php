<?php

    class Categoria extends Conectar{

        public function get_categoria(){
            $conectar = parent::Conexion();
            parent::set_names();
            /*Trae toda la informacion de la tabla*/
            $sql = "SELECT * FROM tm_categoria WHERE est=1";
            $sql= $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    } 

?>