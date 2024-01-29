<?php

include_once 'config/dataBase.php';

 
class Review{
        private $review_id;
        private $user;
        private $rating;
        private $comment;
        private $date;

        public function __construct(){

        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        /**
         * Get the value of rating
         */ 
        public function getRating()
        {
                return $this->rating;
        }

        /**
         * Set the value of rating
         *
         * @return  self
         */ 
        public function setRating($rating)
        {
                $this->rating = $rating;

                return $this;
        }

        /**
         * Get the value of comment
         */ 
        public function getComment()
        {
                return $this->comment;
        }

        /**
         * Set the value of comment
         *
         * @return  self
         */ 
        public function setComment($comment)
        {
                $this->comment = $comment;

                return $this;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getReview_id()
        {
                return $this->review_id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setReview_id($id)
        {
                $this->review_id = $id;

                return $this;
        }

        public static function getReviews(){
            $conn = dataBase::connect();

            $sql = "SELECT review.review_id, usuario.nombre_usuario AS user, review.rating, review.comment, review.date FROM review JOIN usuario ON review.user = usuario.usuario_id ORDER BY review.date DESC";
            $result = $conn->query($sql);
            $conn->close();

            $listaReviews = [];
            while($review = $result->fetch_object('Review')){
                $listaReviews[] = $review;
            }

            return $listaReviews;
        }
    }


?>