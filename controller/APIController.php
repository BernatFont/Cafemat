<?php
include_once 'config/dataBase.php';
include_once 'model/Review.php';

class APIController {

    public function apiShowReviews() {
        $reviews = Review::getReviews();

        $reviewsAsociativo = [];
        foreach ($reviews as $review) {
            $reviewsAsociativo[] = [
                "review_id" => $review->getReview_id(),
                "user"      => $review->getUser(),
                "rating"    => $review->getRating(),
                "comment"   => $review->getComment(),
                "date"      => $review->getDate()
            ];
        }

        $reviewsAsociativo = json_encode($reviewsAsociativo, JSON_UNESCAPED_UNICODE);

        // Establecer las cabeceras adecuadas para una respuesta JSON
        header('Content-Type: application/json');
        
        /* Imprimir directamente la respuesta JSON para que al
        hacer el fetch vea el texto plano en formato JSON y lo pueda cojer */
        echo $reviewsAsociativo;

        // Finalizar la ejecución del script después de enviar la respuesta JSON
        exit();
    }

    public function apiInsertReview(){

    }
}
?>
