<?php
include_once 'config/dataBase.php';
include_once 'model/Review.php';

class APIController {

    public function api() {
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

        // Imprimir directamente la respuesta JSON
        echo $reviewsAsociativo;

        // Finalizar la ejecución del script después de enviar la respuesta JSON
        exit();
    }
}
?>
