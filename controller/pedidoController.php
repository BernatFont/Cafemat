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

                /* CREA EL PEDIDO Y RETORNA SU ID PARA USARLO EN LA SIGUIENTE FUNCION */
                $pedido_id = Pedido::crearPedido($pedido,$usuario->getNombre_usuario());
                /* USAMOS EL ID ANTERIOR PARA AÑADIR TODOS LOS PRODUCTOS SELECCIONADOS EN EL PEDIDO */
                /* SE AÑADEN EN LA TABLA 'Pedido_Producto' DE MySQL */
                Pedido::crearPedidoProducto($pedido,$usuario->getNombre_usuario(),$pedido_id);

                setcookie('recuperarPedido', serialize($pedido), time() + 600);

                unset($_SESSION['carrito']);
    
                header('Location:'.url.'?controller=producto&action=index');
            }else{
                $mensaje = "Para validar el pedido, inicia sesión.";
                include_once 'view/header.php';
            
                include_once 'view/paginaPedido.php';
            
                include_once 'view/footer.php';
            }
        }

        public function verProductosPedido(){
            session_start();

            if(isset($_POST['pedido_id'])){
                $pedido_id = $_POST['pedido_id'];
                $usuario = Usuario::getUsuarioByUsername($_SESSION['usuario']->getNombre_usuario());
                $usuario_id = $usuario->getUsuario_id();
    
                $productos = Pedido::getProductosByPedio($pedido_id);
    
                include_once 'view/header.php';
                
                include_once 'view/paginaProductosPedido.php';
                
                include_once 'view/footer.php';
            }else{
                header('Location:'.url.'?controller=usuario&action=inicioSesion');
            }
        }

        public function recuperarPedido(){
            session_start();
            if(isset($_COOKIE['recuperarPedido'])){
                echo 'Pedido encontrado';
                $_SESSION['carrito'] = unserialize($_COOKIE['recuperarPedido']);
                $pedido = $_SESSION['carrito'];
                
            }else{
                $mensaje = 'No se ha encontrado ningún pedido';
            }

            include_once 'view/header.php';
            
            include_once 'view/paginaPedido.php';
            
            include_once 'view/footer.php';
        }        
    }


?>