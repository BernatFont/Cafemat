<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleReview.css">
    <title>Reseñas | Cafemat</title>
</head>
<body>
    <?php 
        //var_dump($lista);
        foreach($lista as $l){
            echo $l->getReview_id().'<br>';
            echo $l->getUser().'<br>';
            echo $l->getRating().'<br>';
            echo $l->getComment().'<br>';
            echo $l->getDate().'<br>';
        }
     ?>

     <script src="js/scriptReview.js"></script>
</body>
</html>