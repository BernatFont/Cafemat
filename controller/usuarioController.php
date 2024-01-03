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
                        // modificamos el usuario
                        Usuario::modificarUsuario($id,$nombre,$apellido,$correo,$usuario,$contra);
                        $usuario_modificado = 'Usuario modificado correctamente';
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

    }



?>