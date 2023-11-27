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

        public static function getUsuarioByUsername($username){
            $conn = dataBase::connect();
            //Preparamos consulta
            $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
            $result = $conn->query($sql);
            $conn->close();

            $usuario = $result->fetch_object();
            //Retornamos el producto pedido por id
            return $usuario;
        }

        public static function getPedidosUsuario($username){
            $conn = dataBase::connect();

            $sql_user_id = "SELECT usuario_id FROM usuario WHERE nombre_usuario = '$username'";
            $result = $conn->query($sql_user_id);
            $usuario_id = $result->fetch_object();
            $usuario_id = $usuario_id->usuario_id;
            $sql = "SELECT * FROM pedido WHERE usuario_id = '$usuario_id'";
            $result = $conn->query($sql);

            //Almaceno el resultado de la consulta en una array
            $listaPedidos = [];
            while($producto = $result->fetch_object()){
                    $listaPedidos[] = $producto;
            }
            /*Retorno todos los pedidos realizados por el
            usuario pasado por parametroen un array*/
            return $listaPedidos;

        }

        public static function modificarUsuario($id,$nombre,$apellido,$correo,$usuario,$contra){
            $conn = dataBase::connect();

            $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', nombre_usuario = '$usuario', contraseña = '$contra' WHERE usuario_id = '$id'";
            $conn->query($sql);
        }

    }

?>