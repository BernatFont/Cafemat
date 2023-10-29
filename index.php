<?php

    include_once 'controller/productoController.php';
    include_once 'config/parameters.php';



        if (!isset($_GET['controller'])) {
            //Si no se passa nada se mostrara la pagina principal de pedidos
            header("Location:".url."?controller=producto");

        }else{
            $nombre_controller = $_GET['controller'].'Controller';

            if(class_exists($nombre_controller)){

                $controller = new $nombre_controller();

                if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
                    $action = $_GET['action'];
                }else{
                    $action = action_default;
                }

            $controller->$action();
                
            }else {
            //Si no existe vamos al header
            header('Location: '.url.'?controller=producto');
        }

        }

?>