<?php

include_once 'config/dataBase.php';
include_once 'model/Review.php';


    class APIController{

        public function api(){
            $lista = Review::getReviews();
            $reviews =  json_encode($lista, JSON_UNESCAPED_UNICODE) ;

            include_once 'view/header.php';

            include_once 'view/paginaReviews.php';

            include_once 'view/footer.php';

            return $reviews;
        }




    }


?>