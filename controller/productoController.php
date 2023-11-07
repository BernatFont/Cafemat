<?php

    include_once 'config/dataBase.php';
    include_once 'model/Producto.php';


    class productoController{

        public function index(){
            //echo 'Pagina principal pedidos';
            include_once 'view/paginaPrincipal.php';
        }

        public function action(){
            echo 'Pagina compra pedidos';
        }

        public function carta(){
            //echo 'Pagina carta';
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
                include_once 'view/cartaPedido.php';
            }else{
                include_once 'view/cartaPrincipal.php';
            }

        }

        public function crear(){
            include_once 'view/crearProducto.php';
        }

        public function crearProducto(){
            $img = $_POST['img'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            Producto::createProducto($img,$nombre,$precio,$categoria);

            header('Location:'.url.'?controller=producto&action=carta');
        }

        public function eliminar(){
            echo 'ELIMINAR PRODUCTO';
            $id = $_POST['id'];

            Producto::deleteProducto($id);
            header('Location:'.url.'view/cartaPedido.php');
        }

        public function modificar(){
            $id = $_POST['id'];

            $producto = Producto::getProductoById($id);

            include_once 'view/editarProducto.php';
            //header('Location:'.url.'view/editarProducto.php');

        }

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