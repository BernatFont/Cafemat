<?php

    include_once 'config/dataBase.php';
    include_once 'model/Producto.php';    


    class productoController{

        public function index(){
            echo 'Pagina principal pedidos';
        }

        public function action(){
            echo 'Pagina compra pedidos';
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
            $descripcion = $_POST['descripcion'];
    
            Producto::updateProducto($id, $img, $nombre, $precio, $categoria, $descripcion);

            header('Location:'.url.'view/cartaPedido.php');
            
        }
        
    }

?>