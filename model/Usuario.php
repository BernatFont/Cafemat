<?php

include_once 'config/dataBase.php';
include_once 'model/Admin.php';


    class Usuario{

        protected $usuario_id;
        protected $nombre;
        protected $apellido;
        protected $correo;
        protected $nombre_usuario;
        protected $contraseña;

        public function __construct() {
          
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of usuario_id
         */ 
        public function getUsuario_id()
        {
                return $this->usuario_id;
        }

        /**
         * Set the value of usuario_id
         *
         * @return  self
         */ 
        public function setUsuario_id($usuario_id)
        {
                $this->usuario_id = $usuario_id;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of correo
         */ 
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */ 
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        /**
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Set the value of nombre_usuario
         *
         * @return  self
         */ 
        public function setNombre_usuario($nombre_usuario)
        {
                $this->nombre_usuario = $nombre_usuario;

                return $this;
        }

        /**
         * Get the value of contraseña
         */ 
        public function getContraseña()
        {
                return $this->contraseña;
        }

        /**
         * Set the value of contraseña
         *
         * @return  self
         */ 
        public function setContraseña($contraseña)
        {
                $this->contraseña = $contraseña;

                return $this;
        }

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
            
            if ($result->num_rows > 0) {
                // Obtenemos el primer registro como objeto de tipo Usuario
                $firstRow = $result->fetch_object('Usuario');
        
                // Verificamos si el nombre de usuario es igual a user_admin = 'admin'
                if ($firstRow->getNombre_usuario() != user_admin) {
                   $usuario = $firstRow;
                } else {
                    /* HAGO LA CONSULTA DE NUEVO YA QUE NO PUEDO HACER 2 FETCH_OBJECT() DEL MISMO $RESULT,
                    POR QUE AL HACERLO, ME HACE EL FETCH_OBJECT DE LA SIGUIENTE FILA, Y EL RESULT DEVUELVE
                    SOLO 1 FILA*/
                    $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
                    $result = $conn->query($sql);
                    $usuario = $result->fetch_object('Admin');
                }
            }

            $conn->close();

            //Retornamos el Usuario/Admin en forma de objeto
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
            usuario en forma de array*/
            return $listaPedidos;

        }

        public static function modificarUsuario($id,$nombre,$apellido,$correo,$usuario,$contra){
            $conn = dataBase::connect();

            $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', nombre_usuario = '$usuario', contraseña = '$contra' WHERE usuario_id = '$id'";
            $conn->query($sql);
        }

       
    }

?>