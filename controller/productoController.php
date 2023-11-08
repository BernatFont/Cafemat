<?php

    include_once 'config/dataBase.php';
    include_once 'model/Producto.php';


    class productoController{

        /* PAGINA HOME */
        public function index(){
            
            $p1 = Producto::getProductoById(2);
            $p2 = Producto::getProductoById(17);
            $p3 = Producto::getProductoById(8);
            $p4 = Producto::getProductoById(28);

            $productos = [$p1,$p2,$p3,$p4];

            include_once 'view/paginaPrincipal.php';
        }

        /* PAGINA DEL CARRITO */
        public function pedido(){

            include_once 'view/paginaPedido.php';
        }

        /* PAGINA DE LA CARTA */
        public function carta(){

            $productos = Producto::getProductos();
            $numAlmuerzos = Producto::countProductByCategoria('Almuerzo');
            $numPara_comer = Producto::countProductByCategoria('Para comer');
            $numBebida = Producto::countProductByCategoria('Bebida');
            $numPostre = Producto::countProductByCategoria('Postre');

            $productosAlmuerzo = Producto::getProductByCategoria('Almuerzo');
            $productosPara_comer = Producto::getProductByCategoria('Para comer');
            $productosBebida = Producto::getProductByCategoria('Bebida');
            $productosPostre = Producto::getProductByCategoria('Postre');

            $admin = 0;
            if($admin){
                include_once 'view/cartaAdmin.php';
            }else{
                include_once 'view/cartaPrincipal.php';
            }
        }

        /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
        public function crear(){
            include_once 'view/crearProducto.php';
        }

        /* FUNCION QUE CREA EL PRODUCTO Y TE REDIRIJE A LA cartaAdmin */
        public function crearProducto(){
            $img = $_POST['img'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            Producto::createProducto($img,$nombre,$precio,$categoria);

            header('Location:'.url.'?controller=producto&action=carta');
        }

        /* FUNCION PARA ELIMINAR UN PRODUCTO (ADMIN), TE REDIRIJE A LA cartaAdmin */
        public function eliminar(){
            echo 'ELIMINAR PRODUCTO';
            $id = $_POST['id'];

            Producto::deleteProducto($id);
            header('Location:'.url.'view/cartaPedido.php');
        }

        /* FUNCION PARA MODIFICAR UN PRODUCTO, EN LA VIEW DE editarProducto */
        public function modificar(){
            $id = $_POST['id'];

            $producto = Producto::getProductoById($id);

            include_once 'view/editarProducto.php';
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

            header('Location:'.url.'?controller=producto&action=carta');
        }
        
    }

?>