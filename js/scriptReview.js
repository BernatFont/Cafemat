const url = 'http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=API&action=api';


fetch(url)
    .then(reviews => reviews.json())
    .then(review => {
        console.log(review);
        for(r of review){
            console.log('ID de reseña:', r.review_id);
            console.log('Usuario:', r.user);
            console.log('Calificación:', r.rating);
            console.log('Comentario:', r.comment);
            console.log('Fecha:', r.date);
        }
    })
    .catch(error => console.error('Error en la solicitud fetch:', error));



