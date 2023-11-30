<?php

    class categoriaController{


         /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
         public function crear(){

            $categorias = ProductoDAO::getCategorias();

            include_once 'view/header.php';

            include_once 'view/crearProducto.php';

            include_once 'view/footer.php';
        }
    }

?>