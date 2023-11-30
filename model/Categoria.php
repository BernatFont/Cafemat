<?php
include_once 'config/dataBase.php';


    class Categoria{

        private $categoria_id;
        private $nombre;
        private $img;
        private $frase;

        /**
         * Get the value of frase
         */ 
        public function getFrase()
        {
                return $this->frase;
        }

        /**
         * Set the value of frase
         *
         * @return  self
         */ 
        public function setFrase($frase)
        {
                $this->frase = $frase;

                return $this;
        }

        /**
         * Get the value of img
         */ 
        public function getImg()
        {
                return $this->img;
        }

        /**
         * Set the value of img
         *
         * @return  self
         */ 
        public function setImg($img)
        {
                $this->img = $img;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of categoria_id
         */ 
        public function getCategoria_id()
        {
                return $this->categoria_id;
        }

        /**
         * Set the value of categoria_id
         *
         * @return  self
         */ 
        public function setCategoria_id($categoria_id)
        {
                $this->categoria_id = $categoria_id;

                return $this;
        }

        /* FUNCION QUE RETORNA UN LISTADO DE TODAS LAS CATEGORIAS DE LA BD
        CON TODOS LOS DATOS DE CADA CATEGORIA*/
        public static function getCategorias(){
            $conn = dataBase::connect();

            $sql = 'SELECT * FROM categoria';
            $result = $conn->query($sql);
            $listaCategorias = [];
            while($categoria = $result->fetch_object('Categoria')){
                    $listaCategorias[] = $categoria;
            }
            return $listaCategorias;
        }

        /* FUNCION QUE RETORNA TODO EL CONTENIDO DE LA MISMA SEGUN LA ID
        PASSADA POR PARAMETRO */
        public static function getContenidoCategoria($categoria){
            $conn = dataBase::connect();

            $sql = "SELECT * FROM categoria WHERE categoria_id = '$categoria'";
            $result = $conn->query($sql);
            $conn->close();
            //Almaceno el resultado en una variable
            $categoria = $result->fetch_object('Categoria');
            return $categoria;
        }

        /* FUNCION QUE RETORNA EL NUMERO DE CATEGORIAS EXISTENTES */
        public static function getNumCategorias(){
            $conn = dataBase::connect();

            $sql = "SELECT * FROM categoria";
            $result = $conn->query($sql);
            $conn->close();
            //Almaceno el resultado en una variable
            $num_categoria = $result->num_rows;
            return $num_categoria;
        }
    }

?>