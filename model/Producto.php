<?php

include_once 'config/dataBase.php';

    class Producto{

        public static function getProductos(){

                $conn = dataBase::connect();
                //Preparamos consulta
                $sql = 'SELECT * FROM producto';
                $result = $conn->query($sql);
                $conn->close();

                //Almaceno el resultado en una array
                $listaProductos = [];
                while($producto = $result->fetch_object()){
                        $listaProductos[] = $producto;
                }
                return $listaProductos;

        }

        public static function getProductoById($id){
                $conn = dataBase::connect();
                //Preparamos consulta
                $sql = "SELECT * FROM producto WHERE producto_id = $id";
                $result = $conn->query($sql);
                $conn->close();

                $producto = $result->fetch_object();
                return $producto;
        }

        public static function deleteProducto($id){
                $conn = dataBase::connect();

                //Preparamos consulta
                $sql = "DELETE FROM producto WHERE producto_id = '$id'";
                $result = $conn->query($sql);
                $conn->close();
        }       

        public static function updateProducto($id, $img, $nombre, $precio, $categoria, $descripcion){
                $conn = dataBase::connect();

                //Preparamos consulta
                $sql = "UPDATE producto SET producto_id='$id', img='$img', nombre='$nombre', precio='$precio', categoria='$categoria', descripcion='$descripcion' WHERE producto_id=$id";
                $result = $conn->query($sql);
                $conn->close();
        }

        public static function createProducto($img,$nombre,$precio,$categoria,$descripcion){
                $conn = dataBase::connect();

                $sql = "INSERT INTO producto VALUES ('','$img','$nombre','$precio','$categoria','$descripcion')";
                $conn->query($sql);
                $conn->close();
        }

    }

?>