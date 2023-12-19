<?php
include_once 'config/dataBase.php';


    class Pedido{

        private $producto;
        private $cantidad = 1;

        public function __construct($producto){
            $this->producto = $producto;
        }

        /**
         * Get the value of producto
         */ 
        public function getProducto()
        {
                return $this->producto;
        }

        /**
         * Set the value of producto
         *
         * @return  self
         */ 
        public function setProducto($producto)
        {
                $this->producto = $producto;

                return $this;
        }

        /**
         * Get the value of cantidad
         */ 
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /**
         * Set the value of cantidad
         *
         * @return  self
         */ 
        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

                return $this;
        }

        public function precioTotalProducto($precio){
                return number_format(($precio * $this->cantidad), 2);
        }

        /* FUNCION QUE TE DICE SI EXISTE EL PRODUCTO EN EL CARRITO, EN CASO DE
        EXISTIR LE SUMA 1 A LA CANTIDAD. */
        public static function productoExisteEnPedido($carrito,$id_producto){
                $existe = false;
                foreach($carrito as $producto){
                        if($producto->getProducto()->getProducto_id() == $id_producto){
                                $existe = true;
                                $producto->setCantidad($producto->getCantidad()+1);
                        }
                }
                return $existe;
        }

        public static function crearPedido($pedido,$usuario){
                $conn = dataBase::connect();

                $usuario = Usuario::getUsuarioByUsername($usuario);
                $usuario_id = $usuario->getUsuario_id();
                $fecha = date("Y-m-d");
                $hora = date("H:i:s");
                $cantidad_bultos = 0;
                foreach($pedido as $fila){
                        $cantidad_bultos += $fila->getCantidad();
                }
                $coste = CalculadoraPrecios::calcularTotalPedido($pedido);
                $estado = 'pendiente';

                $sql = "INSERT INTO pedido VALUES ('','$usuario_id','$fecha','$hora','$cantidad_bultos','$coste','$estado')";
                $conn->query($sql);

                $sql_pedido_id = "SELECT pedido_id FROM pedido WHERE 
                        usuario_id = '$usuario_id' AND
                        cantidad_bultos = '$cantidad_bultos' AND
                        coste = '$coste' AND
                        estado = '$estado'";
                $pedido_id = $conn->query($sql_pedido_id);

                $pedido_id = $pedido_id->fetch_object();
                return $pedido_id->pedido_id;
        }

        public static function crearPedidoProducto($pedido,$usuario,$pedido_id){
                $conn = dataBase::connect();

                $usuario = Usuario::getUsuarioByUsername($usuario);

                foreach($pedido as $producto){
                        $usuario_id = $usuario->getUsuario_id();
                        $producto_id = $producto->getProducto()->getProducto_id(); 
                        $cantidad = $producto->getCantidad();
                        $precio_unidad = number_format($producto->getProducto()->getPrecio(),2);
                        $precio_total = number_format(($producto->getCantidad()*$producto->getProducto()->getPrecio()),2);

                        $sql = "INSERT INTO pedido_producto VALUES ('$pedido_id','$producto_id','$usuario_id','$cantidad','$precio_unidad','$precio_total')";
                        $conn->query($sql);
                }

                $conn->close();
        }

        public static function getProductosByPedio($pedido_id){
                $conn = dataBase::connect();

                $sql = "SELECT pedido_producto.*, producto.nombre as nombre, producto.img as img FROM pedido_producto INNER JOIN producto ON pedido_producto.producto_id = producto.producto_id WHERE pedido_producto.pedido_id = '$pedido_id'";

                // $sql = "SELECT pedido_producto.*, producto.nombre AS nombre_producto, producto.img AS img_producto
                // FROM pedido_producto 
                // INNER JOIN producto ON pedido_producto.producto_id = producto.producto_id
                // WHERE pedido_producto.pedido_id = '$pedido_id'";
                $result = $conn->query($sql);

                $conn->close();

                //Almaceno el resultado en una array
                $listaProductos = [];
                while($producto = $result->fetch_object('Producto')){
                        $listaProductos[] = $producto;
                }
                return $listaProductos;
        }

        public static function getPedidos(){
                $conn = dataBase::connect();
                
                $sql = "SELECT * FROM pedido ORDER BY fecha_inicio DESC";
                $result = $conn->query($sql);

                $conn->close();

                //Almaceno el resultado en una array
                $listaPedidos = [];
                while($producto = $result->fetch_object()){
                        $listaPedidos[] = $producto;
                }
                return $listaPedidos;
        }

        public static function enviarPedido($id){
                $conn = dataBase::connect();

                $sql = "UPDATE pedido SET estado = 'entregado' WHERE pedido_id = '$id'";
                $conn->query($sql);

                $conn->close();
        }
    }

?>