<?php

    include_once 'config/dataBase.php';
    include_once 'model/Usuario.php';

    class usuarioController{

        public function inicioSesion(){

            include_once 'view/iniciarSesion.php';
        }

        public function validarSesion(){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if(Usuario::usuarioExiste($usuario)){
                if(Usuario::contraCorrecta($usuario,$password)){
                    header('Location:'.url.'?controller=producto&action=index');
                }else{
                    echo 'contraseña incorrecta';
                }
            }else{
                echo 'usuario incorrecto';
            }
        }

        /* PAGINA REGISTRO */
        public function registro(){

            include_once 'view/registroSesion.php';
        }

        public function crearUsuario(){
            
            $usuario = $_POST['usuario'];
            /* si el usuario existe entra en el if */
            /* se comprueba en la funcion usuarioExiste de la clase Usuario pasandole el usuario recivido por post */
            if(Usuario::usuarioExiste($usuario)){
                echo 'el usuario existe, pon otro nombre de usuario';
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

    }



?>