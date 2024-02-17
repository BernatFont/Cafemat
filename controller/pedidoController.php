<?php
include_once 'model/Producto.php';
include_once 'model/Usuario.php';
include_once 'utils/CalculadoraPrecios.php';


    class pedidoController{

        public function validarPedido(){
            session_start();

            /* Si hay sesion iniciada entra al if */
            if(isset($_SESSION['usuario'])){
                $pedido = $_SESSION['carrito'];
                $usuario = $_SESSION['usuario'];
                $tip = $_GET['tip'];
                $puntos = $_GET['puntos'];

                /* CREA EL PEDIDO Y RETORNA SU ID PARA USARLO EN LA SIGUIENTE FUNCION */
                $pedido_id = Pedido::crearPedido($pedido,$usuario->getNombre_usuario(),$tip,$puntos);
                /* USAMOS EL ID ANTERIOR PARA AÑADIR TODOS LOS PRODUCTOS SELECCIONADOS EN EL PEDIDO */
                /* SE AÑADEN EN LA TABLA 'Pedido_Producto' DE MySQL */
                Pedido::crearPedidoProducto($pedido,$usuario->getNombre_usuario(),$pedido_id);
                Usuario::quitarPuntosUsados($puntos*10,$usuario->getNombre_usuario());
                /* Obtenemos el coste del pedido para calcular los puntos que ha ganado el usuario */
                $coste = CalculadoraPrecios::calcularTotalPedido($pedido)+$tip;
                Usuario::setPuntosUser($coste);
                /* Al validar el pedido creamos una cookie con el pedido validado para peder
                recuperarlo posteriormente */
                setcookie('recuperarPedido', serialize($pedido), time() + 600);
                //Vaciamos el pedido
                unset($_SESSION['carrito']);
    
                if(isset($_GET['QR'])){
                    $QR = $_GET['QR'];
                    header('Location:'.url.'?controller=producto&action=index&QR='.$pedido_id);
                }else{
                    header('Location:'.url.'?controller=producto&action=index');
                }
            }else{
                $mensaje = "Para validar el pedido, inicia sesión.";
                include_once 'view/header.php';
            
                include_once 'view/paginaPedido.php';
            
                include_once 'view/footer.php';
            }
        }

        /* FUNCION PARA VER LOS DETALLES DEL PEDIDO SELECCIONADO */
        public function verProductosPedido(){
            session_start();

            if (isset($_SESSION['usuario'])){
                if(isset($_POST['pedido_id'])||isset($_GET['pedido_id'])){
                    if(isset($_POST['pedido_id'])){
                        $pedido_id = $_POST['pedido_id'];
                    }elseif(isset($_GET['pedido_id'])){
                        $pedido_id = $_GET['pedido_id'];
                    }
    
                    $usuario = Usuario::getUsuarioByUsername($_SESSION['usuario']->getNombre_usuario());
                    $usuario_id = $usuario->getUsuario_id();
        
                    $productos = Pedido::getProductosByPedio($pedido_id);
        
                    include_once 'view/header.php';
                    
                    include_once 'view/paginaProductosPedido.php';
                    
                    include_once 'view/footer.php';
                }else{
                    header('Location:'.url.'?controller=usuario&action=inicioSesion');
                }
            }else{
                header('Location:'.url.'?controller=usuario&action=inicioSesion');
            }
        }

        /* FUNCION PARA RECUPERAR EL PEDIDO */
        public function recuperarPedido(){
            session_start();
            //Si encuentra la cookie la muestra
            if(isset($_COOKIE['recuperarPedido'])){
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