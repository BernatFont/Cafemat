<?php

    include_once 'config/dataBase.php';
    include_once 'model/Usuario.php';
    include_once 'model/Admin.php';

    class usuarioController{

        public function inicioSesion(){
            include_once 'view/header.php';

            session_start();
            //si no existe sesion de usuario, entra al if para ir al inicio de sesion
            if(empty($_SESSION['usuario'])){
                if (isset($_GET['mensaje'])) {
                    $mensaje = $_GET['mensaje'];
                }
                include_once 'view/iniciarSesion.php';
            }else{
                    /* si en el panel de usuario le damos al boton de 'modificar usuario',
                    entra en el if */
                    if(isset($_POST['modificar_usuario'])){
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $correo = $_POST['correo'];
                        $usuario = $_POST['usuario'];
                        $contra = $_POST['contra'];
                        if (!Usuario::usuarioExiste($usuario)){
                            //Modificamos el usuario entero
                            Usuario::modificarUsuario($id,$nombre,$apellido,$correo,$usuario,$contra);
                            $_SESSION['usuario']->setNombre_usuario($usuario);
                            $usuario_modificado = 'Usuario modificado correctamente';
                        }else{
                            //Modifico todo menos el usuario por que ya existe
                            Usuario::modificarUsuario($id,$nombre,$apellido,$correo,$_SESSION['usuario']->getNombre_usuario(),$contra);
                            $usuario_modificado = 'El usuario ya existe, prueba con otro.';
                        }
                        $_SESSION['usuario']->setUsuario_id($id);
                        $_SESSION['usuario']->setNombre($nombre);
                        $_SESSION['usuario']->setApellido($apellido);
                        $_SESSION['usuario']->setCorreo($correo);
                        $_SESSION['usuario']->setContraseña($contra);
                    }
                    //si existe la sesion obtenemos el usuario y sus pedidos
                    if(isset($_SESSION['usuario'])){
                        $usuario = Usuario::getUsuarioByUsername($_SESSION['usuario']->getNombre_usuario());
                        $_SESSION['usuario'] = $usuario;
                        $pedidos_usuario = Usuario::getPedidosUsuario($_SESSION['usuario']->getNombre_usuario());
                    }

                    include_once 'view/paginaUsuario.php';
            }

            include_once 'view/footer.php';
        }
        /* FUNCION PARA VALIDAR SI LA SESION Y LA CONTRASEÑA EXISTEN */
        public function validarSesion(){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if(Usuario::usuarioExiste($usuario)){
                if(Usuario::contraCorrecta($usuario,$password)){
                    header('Location:'.url.'?controller=producto&action=index&usuario='.$usuario.'');
                }else{
                    $mensaje = 'Contraseña incorrecta.';

                    include_once 'view/header.php';
                    include_once 'view/iniciarSesion.php';
                    include_once 'view/footer.php';
                }
            }else{
                $mensaje = 'Usuario inexistente.';
                
                include_once 'view/header.php';
                include_once 'view/iniciarSesion.php';
                include_once 'view/footer.php';
            }
        }

        /* PAGINA REGISTRO */
        public function registro(){
            include_once 'view/header.php';

            include_once 'view/registroSesion.php';

            include_once 'view/footer.php';
        }

        /* FUNCION PARA CREAR USUARIO */
        public function crearUsuario(){
            
            $usuario = $_POST['usuario'];
            /* si el usuario existe entra en el if */
            /* se comprueba en la funcion usuarioExiste de la clase Usuario pasandole el usuario recivido por post */
            if(Usuario::usuarioExiste($usuario)){
                $mensaje = 'Usuario existente, prueba con otro.';
                
                include_once 'view/header.php';
                include_once 'view/registroSesion.php';
                include_once 'view/footer.php';
            }else{
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $contra = $_POST['contra'];
    
                /* creamo el usuario */
                Usuario::crearUsuario($nombre,$apellido,$correo,$usuario,$contra);
                /* redirigimos a la pagina de iniciar sesion */
                header('Location:'.url.'?controller=usuario&action=inicioSesion');
            }
        }

        /* FUNCION PARA CERRAR CUENTA (ELIMINA LA COOKIE DE RECUPERAR PEDIDO) */
        public function cerrarCuenta(){

            if(isset($_COOKIE['recuperarPedido'])){
                setcookie('recuperarPedido', '', time() - 600);
            }
            session_start();

            session_unset();

            session_destroy();

            header('Location:'.url.'?controller=producto&action=index');
        }

        //FUNCION PARA OBTENER EL USUARIO ACTUAL DESDE JS CON UN FETCH
        public function usuarioActualYpuntos(){
            session_start();

            if (isset($_SESSION['usuario'])){
                $usuarioYpuntos = [$_SESSION['usuario']->getNombre_usuario(),$_SESSION['usuario']->getPuntos()];
                $usuarioConPuntos = json_encode($usuarioYpuntos, JSON_UNESCAPED_UNICODE);
            }else{
                $usuarioConPuntos = "null";
            }
            header('Content-Type: application/json');
            
            echo $usuarioConPuntos;

            exit();
        }
        /* FUNCION PARA OBTENER LOS PUNTOS DEL USUARIO PASADO POR GET CON JS */
        public function getPuentosUsuario(){
            $conn = dataBase::connect();

            $usuario = $_GET['user'];
            // Eliminar las comillas del nombre de usuario que me pone js
            $usuario = str_replace('"', '', $usuario);

            $sql = "SELECT puntos FROM usuario WHERE nombre_usuario = '$usuario'";
            $result = $conn->query($sql);
            $result = $result->fetch_object();
            $puntos = json_encode($result->puntos, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');

            echo $puntos;
            exit;
        }

    }



?>