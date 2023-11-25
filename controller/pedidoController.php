<?php
include_once 'model/Producto.php';
include_once 'model/Usuario.php';
include_once 'utils/CalculadoraPrecios.php';


    class pedidoController{

        public function validarPedido(){
            session_start();

            if(isset($_SESSION['usuario'])){
                $pedido = $_SESSION['carrito'];
                $usuario = $_SESSION['usuario'];
    
                Pedido::crearPedido($pedido,$usuario);

                unset($_SESSION['carrito']);
    
                header('Location:'.url.'?controller=producto&action=index');
            }else{
                $mensaje = "Para validar el pedido, inicia sesión.";
                include_once 'view/header.php';
            
                include_once 'view/paginaPedido.php';
            
                include_once 'view/footer.php';
            }
        }
    }


?>