<?php

    include_once 'config/dataBase.php';
    include_once 'model/Producto.php';
    include_once 'model/Pedido.php';
    include_once 'utils/CalculadoraPrecios.php';


    class productoController{

        /* PAGINA HOME */
        public function index(){
            session_start();
            if(isset($_GET['usuario'])){
                
                if(isset($_SESSION['carrito'])){
                    session_unset();
                }
                
                $usuario = $_GET['usuario'];
                $_SESSION['usuario'] = $usuario;
            }

            $p1 = Producto::getProductoById(2);
            $p2 = Producto::getProductoById(17);
            $p3 = Producto::getProductoById(8);
            $p4 = Producto::getProductoById(28);

            $productos = [$p1,$p2,$p3,$p4];

            include_once 'view/header.php';

            include_once 'view/paginaPrincipal.php';

            include_once 'view/footer.php';
        }

        /* PAGINA DEL CARRITO */
        public function pedido(){
            session_start();

            if(isset($_POST['borrar'])){
                unset($_SESSION["carrito"][$_POST['borrar']]);
                //Reindexamos el array por que sino causa conflicto
                $_SESSION["carrito"] = array_values($_SESSION["carrito"]);

            }elseif(isset($_POST['add'])){
                $prod = $_SESSION["carrito"][$_POST['add']];
                $prod->setCantidad($prod->getCantidad()+1);

            }elseif(isset($_POST['remove'])){
                $prod = $_SESSION["carrito"][$_POST['remove']];

                if($prod->getCantidad() == 1){
                    unset($_SESSION["carrito"][$_POST['remove']]);
                    $_SESSION["carrito"] = array_values($_SESSION["carrito"]);

                }else{
                    $prod->setCantidad($prod->getCantidad()-1);
                }
            }

            include_once 'view/header.php';
            
            include_once 'view/paginaPedido.php';
            
            include_once 'view/footer.php';
        }

        public function agregarAlPedido(){
            session_start();
            //$carrito = 'carrito'.$usuario_id;
            if(!isset($_SESSION['carrito'])){
                $_SESSION['carrito'] = array();
                if(isset($_POST['producto_id'])){
                    $pedido = new Pedido(Producto::getProductoById($_POST['producto_id']));
                    $_SESSION['carrito'][0] = $pedido;
                }
            }else{
                if(isset($_POST['producto_id'])){
                    $pedido = new Pedido(Producto::getProductoById($_POST['producto_id']));
                }
                array_push($_SESSION['carrito'],$pedido);
            }
            header('Location:'.url.'?controller=producto&action=carta');
        }

        public function borrarPedido(){
            session_start();

            session_unset();
            header('Location:'.url.'?controller=producto&action=pedido');
        }

        /* PAGINA DE LA CARTA */
        public function carta(){

            $productos = Producto::getProductos();
            $numAlmuerzos = Producto::countProductByCategoria(1);
            $numPara_comer = Producto::countProductByCategoria(2);
            $numBebida = Producto::countProductByCategoria(3);
            $numPostre = Producto::countProductByCategoria(4);

            $productosAlmuerzo = Producto::getProductByCategoria(1);
            $productosPara_comer = Producto::getProductByCategoria(2);
            $productosBebida = Producto::getProductByCategoria(3);
            $productosPostre = Producto::getProductByCategoria(4);

            include_once 'view/header.php';

            include_once 'view/cartaPrincipal.php';

            include_once 'view/footer.php';
        }

        public function panelControlAdmin(){
            $productos = Producto::getProductos();

            include_once 'view/header.php';

            include_once 'view/cartaAdmin.php';

            include_once 'view/footer.php';
        }

        /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
        public function crear(){

            $categorias = Producto::getCategorias();

            include_once 'view/header.php';

            include_once 'view/crearProducto.php';

            include_once 'view/footer.php';
        }

        /* FUNCION QUE CREA EL PRODUCTO Y TE REDIRIJE A LA cartaAdmin */
        public function crearProducto(){
            $img = $_POST['img'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            Producto::createProducto($img,$nombre,$precio,$categoria);

            header('Location:'.url.'?controller=producto&action=panelControlAdmin');
        }

        /* FUNCION PARA ELIMINAR UN PRODUCTO (ADMIN), TE REDIRIJE A LA cartaAdmin */
        public function eliminar(){
            echo 'ELIMINAR PRODUCTO';
            $id = $_POST['id'];

            Producto::deleteProducto($id);
            header('Location:'.url.'view/cartaAdmin.php');
        }

        /* FUNCION PARA MODIFICAR UN PRODUCTO, EN LA VIEW DE editarProducto */
        public function modificar(){
            $id = $_POST['id'];

            $producto = Producto::getProductoById($id);
            $categorias = Producto::getCategorias();

            include_once 'view/header.php';

            include_once 'view/editarProducto.php';

            include_once 'view/footer.php';
        }

        /* FUNCION PARA EDITAR EL PRODUCTO CON LOS DATOS ENVIADOS DE LA VISTA editarProducto */
        /* TE REDIRIJE A LA cartaAdmin */
        public function editProducto(){
    
            $id = $_POST['id'];
            $img = $_POST['img'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
    
            Producto::updateProducto($id, $img, $nombre, $precio, $categoria);

            header('Location:'.url.'?controller=producto&action=panelControlAdmin');
        }
        
    }

?>