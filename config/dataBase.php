<?php
    /* CLASE PARA LA CONEXION CON LA BASE DE DATOS */
    class dataBase{

        public static function connect($host = 'localhost', $user = 'root', $password = '', $db = 'obramat'){
            $conn = new mysqli($host,$user,$password,$db);
            if ($conn->connect_error) {
                die('DATABASE ERROR'.$conn->connect_error);
            } else {
                return $conn;
            }
            
        }

    }

?>