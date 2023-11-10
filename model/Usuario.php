<?php

include_once 'config/dataBase.php';

    class Usuario{

        public static function crearUsuario($nombre='-',$apellido='-',$correo='-',$user,$password){
            $conn = dataBase::connect();

            $sql = "INSERT INTO usuario VALUES ('','$nombre','$apellido','$correo','$user','$password')";
            $conn->query($sql);
            $conn->close();
        }

        public static function usuarioExiste($usuario){
            $conn = dataBase::connect();
            
            $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                /* el usuario introducido existe */
                return true;
            }else{
                return false;
            }
        }

        public static function contraCorrecta($usuario,$contra){
            $conn = dataBase::connect();

            $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario' AND contraseña = '$contra'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                /* el usuario introducido existe */
                return true;
            }else{
                return false;
            }
        }

    }

?>