const url = 'http://bernatdaw2.com/Proyecto_1/Cafemat/?';
const containerReviews = document.getElementById("container_reviews");

fetch(url+'controller=API&action=apiShowReviews')
    .then(response => response.json())
    .then(reviews => {
        console.log(reviews);
        for(r of reviews){
            let reviewCard = document.createElement("div");
            reviewCard.classList.add("reviewDiv");

            let reviewUser = r.user;
            let user = document.createElement("p");
            user.textContent = reviewUser;

            let reviewDate = r.date;
            let date = document.createElement("p");
            date.textContent = reviewDate;

            let reviewRating = r.rating;
            console.log(reviewRating);
            let rating = document.createElement("div");
            rating.classList.add("rating");
            /* FOR que nos muestra el numero de estrellas segun el rating puesto 
            por el usuario */
            for (let i = 0; i < reviewRating; i++) {
                let star = document.createElement("span");
                star.classList.add("star");
                star.textContent = "★";
                //Vamos añadiendo las estrellas
                rating.appendChild(star);
            }

            let reviewComment = r.comment;
            let comment = document.createElement("p");
            comment.textContent = reviewComment;

            reviewCard.appendChild(user);
            reviewCard.appendChild(date);
            reviewCard.appendChild(rating);
            reviewCard.appendChild(comment);
            containerReviews.appendChild(reviewCard);
        }
    })
    .catch(error => console.error('Error en la solicitud fetch:', error));
