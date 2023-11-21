<?php

    include_once 'config/dataBase.php';
    include_once 'model/Usuario.php';

    class usuarioController{

        public function inicioSesion(){
            include_once 'view/header.php';

            session_start();

            if(empty($_SESSION['usuario'])){
                include_once 'view/iniciarSesion.php';
            }else{
                $usuario = Usuario::getUsuarioByUsername($_SESSION['usuario']);

                include_once 'view/paginaUsuario.php';
            }

            include_once 'view/footer.php';
        }

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

        public function cerrarCuenta(){
            session_start();

            session_unset();

            session_destroy();

            header('Location:'.url.'?controller=producto&action=index');
        }

    }



?>