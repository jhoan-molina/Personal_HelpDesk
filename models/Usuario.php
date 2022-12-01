<?php

    class Usuario extends Conectar{

        public function login(){
            $conectar=parent::Conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                //Almacena los valores del formulario en las variables correo y pass
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                $rol = $_POST["rol_id"];
                //Valida si algunp de los campos esta vacio, si es asi lanza un error
                //si no es asi sigue su ejecucion
                if(empty($correo) and empty($pass)){
                    //Lanza el error en dado caso que este vacío
                    header("Location: ".Conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql ="SELECT * FROM tm_usuario WHERE usu_correo=? AND usu_pass=? AND rol_id=? AND est=1";
                    //establece la conexion, asigna para cada posicion la variable (correo, pass),
                    //luego ejecuta la variable
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->bindValue(3, $rol);
                    $stmt->execute();
                    //
                    $resultado = $stmt->fetch();
                    //valida si resultado es un arreglo y si ese arreglo tiene un tamaño mayor a 0
                    if(is_array($resultado) and count($resultado)>0){
                        //establece los valores que contendra la sesión 
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nom"]=$resultado["usu_nom"];
                        $_SESSION["usu_ape"]=$resultado["usu_ape"];
                        $_SESSION["rol_id"]=$resultado["rol_id"];
                        header("Location: ".Conectar::ruta()."view/Home/");
                        exit();
                    }else{
                        //Lanza el error si el usuario o la contraseña no son correctas 
                        header("Location: ".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }
    }

?>