<?php

    class reviewController{
        public function reviews(){
            session_start();
            include_once "view/header.php";
            include_once "view/paginaReviews.php";
            include_once "view/footer.php";
        }
    }


?>