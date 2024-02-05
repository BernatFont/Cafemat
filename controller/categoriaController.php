<?php

    class categoriaController{


        //  /* PAGINA PARA CREAR PRODUCTO (ADMIN) */
        //  public function crear(){

        //     $categorias = ProductoDAO::getCategorias();

        //     include_once 'view/header.php';

        //     include_once 'view/crearProducto.php';

        //     include_once 'view/footer.php';
        // }

        public function getNombreCategorias(){
            $categorias = Categoria::getCategorias();

            foreach($categorias as $categoria){
                $nombres_cat[] = $categoria->getNombre();
            }
            

            $nombres_cat = json_encode($nombres_cat, JSON_UNESCAPED_UNICODE);

            // Establecer las cabeceras adecuadas para una respuesta JSON
            header('Content-Type: application/json');
            
            /* Imprimir directamente la respuesta JSON para que al
            hacer el fetch vea el texto plano en formato JSON y lo pueda cojer */
            echo $nombres_cat;

            // Finalizar la ejecución del script después de enviar la respuesta JSON
            exit();
        }
    }

?>