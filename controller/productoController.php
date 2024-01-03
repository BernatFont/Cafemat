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
            
            //Obtenemos el usuario pasado por get
            if(isset($_GET['usuario'])){
                //Si existe el carrito lo vaciamos
                if(isset($_SESSION['carrito'])){
                    session_unset();
                }
                
                //Creamos el Usuario/Admin como un objeto
                $usuario = Usuario::getUsuarioByUsername($_GET['usuario']);
                //Si el usuario es Admin cramos objeto tipo Admin sino tipo Usuario
                if($usuario->getNombre_usuario() == user_admin){
                    $user = new Admin();
                    $user->setNivelAcceso(1);
                }else{
                    $user = new Usuario();   
                }
                $user->setUsuario_id($usuario->getUsuario_id());
                $user->setNombre($usuario->getNombre());
                $user->setApellido($usuario->getApellido());
                $user->setCorreo($usuario->getCorreo());
                $user->setNombre_usuario($usuario->getNombre_usuario());
                $user->setContraseña($usuario->getContraseña());

                //Ponemos el objeto de Usuario/Admin en la sesion
                $_SESSION['usuario'] = $user;
            }

            //Obtenemos productos destacados
            $p1 = ProductoDAO::getProductoById(2);
            $p2 = ProductoDAO::getProductoById(17);
            $p3 = ProductoDAO::getProductoById(8);
            $p4 = ProductoDAO::getProductoById(28);

            //Almacenamos productos destacados en un array
            $productos = [$p1,$p2,$p3,$p4];

            include_once 'view/header.php';

            include_once 'view/paginaPrincipal.php';

            include_once 'view/footer.php';
        }

        /* PAGINA DEL CARRITO */
        public function pedido(){
            session_start();

            //Si le damos a la X, eliminamos el producto al que le hemos dado
            //$_POST['borrar'] = posicion donde se encuentra el producto dentro del array de la sesion
            if(isset($_POST['borrar'])){
                unset($_SESSION["carrito"][$_POST['borrar']]);
                //Reindexamos el array por que sino causa conflicto
                $_SESSION["carrito"] = array_values($_SESSION["carrito"]);
            //Añadimos uno al product que le hemos dado al mas
            }elseif(isset($_POST['add'])){
                $prod = $_SESSION["carrito"][$_POST['add']];
                $prod->setCantidad($prod->getCantidad()+1);
            //Quitamos uno al product que le hemos dado al menos
            }elseif(isset($_POST['remove'])){
                $prod = $_SESSION["carrito"][$_POST['remove']];

                if($prod->getCantidad() == 1){
                    unset($_SESSION["carrito"][$_POST['remove']]);
                    $_SESSION["carrito"] = array_values($_SESSION["carrito"]);

                }else{
                    $prod->setCantidad($prod->getCantidad()-1);
                }
            }elseif(isset($_POST['eliminar_pedido'])){
                unset($_SESSION['carrito']);
            }

            include_once 'view/header.php';
            
            include_once 'view/paginaPedido.php';
            
            include_once 'view/footer.php';
        }

        //Funcion que agrega un producto al carrito en caso de que exista
        //Si no existe el carrito, lo crea y añade el producto
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

        /* PAGINA DE LA CARTA */
        public function carta(){
            //Obtenemos todos los productos
            $productos = ProductoDAO::getProductos();
            //Obtenemos el numero de categorias existentes
            $num_categorias = Categoria::getNumCategorias();
            $num_productos = [];
            $categorias = [];
            $contenido_categoria = [];

            for ($i=1; $i <= $num_categorias; $i++) { 
                //Retorna el numero de productos según su categoria
                $numProdCat = ProductoDAO::countProductByCategoria($i);
                array_push($num_productos,$numProdCat);

                //Almacenamos el contenido/caracteristicas de cada categoria en el arreglo
                //Por ejemplo la ruta de la img de la seccion de la categoria
                $contenidoCat = Categoria::getContenidoCategoria($i);
                array_push($contenido_categoria,$contenidoCat);
                
                //Retorna todos los productos de la categoria pasada por parametro
                $productosCat = ProductoDAO::getProductByCategoria($i);
                array_push($categorias,$productosCat);
            }

            include_once 'view/header.php';

            include_once 'view/cartaPrincipal.php';

            include_once 'view/footer.php';
        }

        //Pagina usuario del Administrador
        public function panelControlAdmin(){

            /* IF PARA EDITAR EL PRODUCTO CON LOS DATOS ENVIADOS DE LA VISTA editarProducto */
            if(isset($_POST['editar_producto'])){
                $id = $_POST['id'];
                $img = $_POST['img'];
                $nombre = $_POST['nombre'];
                $precio = number_format($_POST['precio'],2);
                $categoria = $_POST['categoria'];
                
                //Hace el update con los nuevos datos del producto
                ProductoDAO::updateProducto($id, $img, $nombre, $precio, $categoria);
            }

            /* IF QUE CREA EL PRODUCTO */
            if(isset($_POST['crear_producto'])){
                $img = $_POST['img'];
                $nombre = $_POST['nombre'];
                $precio = number_format($_POST['precio'],2);
                $categoria = $_POST['categoria'];

                //Funcion que inserta el producto a la BD
                ProductoDAO::createProducto($img,$nombre,$precio,$categoria);
            }

            /*SI LE DAMOS AL BOTON DE ELIMINAR UN PRODUCTO, SE RECIVE
            POR POST Y SE ELIMINA DENTRO DE ESTE IF */
            if(isset($_POST['eliminar_producto'])){
                $id = $_POST['id'];

                ProductoDAO::deleteProducto($id);
            }

            /*IF QUE PONEL EL PEDIDO DEL ESTADO "pendiente" A "enviado",
            AL DARLE AL BOTON DE ENVIAR DEL PEDIDO */
            if(isset($_POST['enviar_pedido'])){
                
                Pedido::enviarPedido($_POST['id']);
            }
            
            //Obtenemos todos los productos para mostrarlos en la view
            $productos = ProductoDAO::getProductos();
            //Obtenemos todos los pedidos para mostrarlos en la view
            $pedidos = Pedido::getPedidos();

            include_once 'view/header.php';

            include_once 'view/cartaAdmin.php';

            include_once 'view/footer.php';
        }

        /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
        public function crear(){
            //Obtengo las categorias
            $categorias = Categoria::getCategorias();

            include_once 'view/header.php';

            include_once 'view/crearProducto.php';

            include_once 'view/footer.php';
        }

        /* FUNCION PARA MODIFICAR UN PRODUCTO, EN LA VIEW DE editarProducto */
        public function modificar(){
            $id = $_POST['id'];

            //Obtengo el producto a editar con el id pasado por post
            $producto = ProductoDAO::getProductoById($id);
            //Obtengo las categorias
            $categorias = Categoria::getCategorias();

            include_once 'view/header.php';

            include_once 'view/editarProducto.php';

            include_once 'view/footer.php';
        }
        
    }

?>