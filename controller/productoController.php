<?php

    include_once 'config/dataBase.php';
    include_once 'model/Producto.php';
    include_once 'model/ProductoDAO.php';
    include_once 'model/Pedido.php';
    include_once 'model/Categoria.php';
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

            $p1 = ProductoDAO::getProductoById(2);
            $p2 = ProductoDAO::getProductoById(17);
            $p3 = ProductoDAO::getProductoById(8);
            $p4 = ProductoDAO::getProductoById(28);

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
                    $pedido = new Pedido(ProductoDAO::getProductoById($_POST['producto_id']));
                    $_SESSION['carrito'][0] = $pedido;
                }
            }else{
                if(isset($_POST['producto_id'])){
                    if(Pedido::productoExisteEnPedido($_SESSION['carrito'],$_POST['producto_id'])){
                        /*en la misma funcion donde se comprueba si existe el producto en el carrito,
                        si retorna true (entra en el if), se le suma 1 directamente*/
                    }else{
                        $pedido = new Pedido(ProductoDAO::getProductoById($_POST['producto_id']));
                        array_push($_SESSION['carrito'],$pedido);
                    }
                }
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

            $productos = ProductoDAO::getProductos();
            $num_categorias = Categoria::getNumCategorias();
            $num_productos = [];
            $categorias = [];
            $contenido_categoria = [];

            for ($i=1; $i <= $num_categorias; $i++) { 
                $numProdCat = ProductoDAO::countProductByCategoria($i);
                array_push($num_productos,$numProdCat);

                $productosCat = ProductoDAO::getProductByCategoria($i);
                array_push($categorias,$productosCat);
                
                $contenidoCat = Categoria::getContenidoCategoria($i);
                array_push($contenido_categoria,$contenidoCat);

            }

            include_once 'view/header.php';

            include_once 'view/cartaPrincipal.php';

            include_once 'view/footer.php';
        }

        public function panelControlAdmin(){

            /* FUNCION PARA EDITAR EL PRODUCTO CON LOS DATOS ENVIADOS DE LA VISTA editarProducto */
            if(isset($_POST['editar_producto'])){
                $id = $_POST['id'];
                $img = $_POST['img'];
                $nombre = $_POST['nombre'];
                $precio = number_format($_POST['precio'],2);
                $categoria = $_POST['categoria'];
        
                ProductoDAO::updateProducto($id, $img, $nombre, $precio, $categoria);
            }

            /* FUNCION QUE CREA EL PRODUCTO */
            if(isset($_POST['crear_producto'])){
                $img = $_POST['img'];
                $nombre = $_POST['nombre'];
                $precio = number_format($_POST['precio'],2);
                $categoria = $_POST['categoria'];

            ProductoDAO::createProducto($img,$nombre,$precio,$categoria);
            }

            /*SI LE DAMOS AL BOTON DE ELIMINAR UN PRODUCTO, SE RECIVE
            POR POST Y SE ELIMINA DENTRO DE ESTE IF */
            if(isset($_POST['eliminar_producto'])){
                $id = $_POST['id'];

                ProductoDAO::deleteProducto($id);
            }
            $productos = ProductoDAO::getProductos();

            include_once 'view/header.php';

            include_once 'view/cartaAdmin.php';

            include_once 'view/footer.php';
        }

        /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
        public function crear(){

            $categorias = Categoria::getCategorias();

            include_once 'view/header.php';

            include_once 'view/crearProducto.php';

            include_once 'view/footer.php';
        }

        /* FUNCION PARA MODIFICAR UN PRODUCTO, EN LA VIEW DE editarProducto */
        public function modificar(){
            $id = $_POST['id'];

            $producto = ProductoDAO::getProductoById($id);
            $categorias = Categoria::getCategorias();

            include_once 'view/header.php';

            include_once 'view/editarProducto.php';

            include_once 'view/footer.php';
        }
        
    }

?>