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
        $conn = dataBase::connect();
        session_start();

        $jsonReview = json_decode(file_get_contents('php://input'), true);

        // Verificar si las claves están presentes en el array
        if (isset($jsonReview['comment']) && isset($jsonReview['rating']) && isset($jsonReview['date'])) {
            $comment = $jsonReview['comment'];
            $rating = $jsonReview['rating'];
            $date = $jsonReview['date'];
            $user = $_SESSION['usuario']->getUsuario_id();
            //Insertamos la reseña en la base de datos
            $sql = "INSERT INTO review VALUES ('','$user','$rating','$comment','$date')";
            $conn->query($sql);
            $conn->close();
            echo "Comment: ".$comment." Rating: ".$rating." Date: ".$date." Usuario: ".$user;
        } else {
            echo 'Error al obtener datos';
        }

    }
}
?>
