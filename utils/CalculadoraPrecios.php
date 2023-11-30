<?php
    class CalculadoraPrecios{

        public static function calcularTotalPedido($pedido){
            $total = 0;

            foreach($pedido as $producto){
                $total += $producto->precioTotalProducto($producto->getProducto()->getPrecio());
            }
            return number_format($total,2);
        }

        public static function calcularPrecioSinIVA($pedido){
            $total = 0;

            foreach($pedido as $producto){
                $total += $producto->precioTotalProducto($producto->getProducto()->getPrecio());
            }
            
            $iva = ($total * 10)/100;
            $total -= $iva;
            $total_y_IVA = [$total,$iva];
            return $total_y_IVA;
        }
    }


?>