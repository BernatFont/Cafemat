<?php

    /*INCLUDES PARA QUE EL index.php SEPA QUE EXISTEN ESTOS CONTROLLERS Y LOS BUSQUE
    Y ASI ENCONTRAR LAS FUNCIONES DONDE SE EJECUTAN TODAS LAS OPERACIONES DE LA PAGINA */
    include_once 'controller/productoController.php';
    include_once 'controller/usuarioController.php';
    include_once 'controller/pedidoController.php';
    include_once 'controller/reviewController.php';
    include_once 'controller/APIController.php';
    include_once 'config/parameters.php';


        //Si no se passa nada por url se mostrara la pagina principal de pedidos
        if (!isset($_GET['controller'])) {
            header("Location:".url."?controller=producto");

        }else{
            //Obtenemos el tipo de controller padado por url
            $nombre_controller = $_GET['controller'].'Controller';
            //Si la clase del controller existe, entra en el if
            if(class_exists($nombre_controller)){

                $controller = new $nombre_controller();
                //Si el metodo pasado en el action existe, entramos en el if para asignar la funcion en el $action
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