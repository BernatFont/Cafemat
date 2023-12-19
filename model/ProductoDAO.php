<?php

include_once 'config/dataBase.php';

    class ProductoDAO{

        /* FUNCION QUE RETORNA UN ARRAY DE TODOS LOS PRODUCTOS */
        public static function getProductos(){

                $conn = dataBase::connect();
                //Consulta para obtener todos los productos

                $sql = 'SELECT producto.producto_id, producto.img, producto.nombre, producto.precio, categoria.nombre AS categoria
                FROM producto
                INNER JOIN categoria ON producto.categoria_id = categoria.categoria_id'; 

                /* $sql = 'SELECT * FROM producto'; */
                $result = $conn->query($sql);
                $conn->close();

                //Almaceno el resultado de la consulta en una array
                $listaProductos = [];
                while($producto = $result->fetch_object('Producto')){
                        $listaProductos[] = $producto;
                }
                //Retorno todos los productos en un array
                return $listaProductos;

        }

        /* FUNCION QUE RETORNA UN PRODUCTO SEGÚN LA ID PASADA POR PARAMETRO */
        public static function getProductoById($id){
                $conn = dataBase::connect();
                //Preparamos consulta
                $sql = "SELECT * FROM producto WHERE producto_id = $id";
                $result = $conn->query($sql);
                $conn->close();

                $producto = $result->fetch_object('Producto');
                //Retornamos el producto pedido por id
                return $producto;
        }

        /* FUNCION QUE ELIMINA UN PRODUCTO SEGÚN LA ID PASADA POR PARAMETRO */
        public static function deleteProducto($id){
                $conn = dataBase::connect();

                //Consulta
                $sql = "DELETE FROM producto WHERE producto_id = '$id'";
                $result = $conn->query($sql);
                $conn->close();
        }       

        /* FUNCION QUE MODIFICA UN PRODUCTO PASANDOLE TODAS SUS PROPIEDADES POR PARAMETRO */
        public static function updateProducto($id, $img, $nombre, $precio, $categoria){
                $conn = dataBase::connect();

                //Preparamos consulta
                $sql = "UPDATE producto SET producto_id='$id', img='$img', nombre='$nombre', precio='$precio', categoria_id='$categoria' WHERE producto_id=$id";
                $result = $conn->query($sql);
                $conn->close();
        }

        /* FUNCION QUE CREA UN PRODUCTO PASANDOLE TODOS LOS DATOS POR PARAMETRO */
        public static function createProducto($img,$nombre,$precio,$categoria){
                $conn = dataBase::connect();

                $sql = "INSERT INTO producto VALUES ('','$img','$nombre','$precio','$categoria')";
                $conn->query($sql);
                $conn->close();
        }

        /* FUNCION QUE RETORNA EL NUMERO DE PRODUCTOS QUE HAY EN LA BD SEGÚN SU CATEGORIA, PASADA POR PARAMETRO */
        public static function countProductByCategoria($categoria){
                $conn = dataBase::connect();

                $sql = "SELECT COUNT(*) FROM producto WHERE categoria_id = '$categoria'";
                $result = $conn->query($sql);
                $conn->close();
                return $result->fetch_array()[0];
        }

        /* FUNCION QUE RETORNA UN ARRAY DE TODOS LOS PRODUCTOS EXISTENTES EN LA BD DE UNA CATEGORIA CONCRETA, PASADA POR PARAMETRO */
        public static function getProductByCategoria($categoria){
                $conn = dataBase::connect();

                $sql = "SELECT * FROM producto WHERE categoria_id = '$categoria'";
                $result = $conn->query($sql);
                $conn->close();
                //Almaceno el resultado en una array
                $listaProductos = [];
                while($producto = $result->fetch_object('Producto')){
                        $listaProductos[] = $producto;
                }
                return $listaProductos;
        }

    }

?>