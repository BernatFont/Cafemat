<?php
    class CalculadoraPrecios{

        public static function calcularTotalPedido($pedido){
            $total = 0;

            foreach($pedido as $producto){
                $total += $producto->precioTotalProducto($producto->getProducto()->precio);
            }
            return number_format($total,2);
        }
    }


?>