<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleReview.css">
    <link rel="stylesheet" href="library/sweetalert/sweetalert2.min.css">
    <title>Reseñas | Cafemat</title>
</head>

<body>
    <?php
        if (isset($_SESSION['usuario'])){ ?>
            <div class="createReviewContainer">
                <button id="createReview" class="bt"><img class="reviewIcon"src="icon/review.png" alt="logo para dejar tu reseña"></button>
            </div>
    <?php } ?>
    <section id="container_reviews" class=""></section>

    <script src="library/sweetalert/sweetalert2.min.js"></script>
    <script src="library/sweetalert/cleave.min.js"></script>
    <script src="library/sweetalert/addons/cleave-phone.i18n.js"></script>
    <script src="js/scriptReview.js"></script>
</body>
</html>