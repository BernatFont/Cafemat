const url = 'http://bernatdaw2.com/Proyecto_1/Cafemat/?';

const containerReviews = document.getElementById("container_reviews");
 /*LLAMO A LA FUNCION QUE ME MUESTRA TODAS LAS REVIEWS */
getReviews();

/* CREAR LA REVIEW */
const createReview = document.getElementById("createReview");
createReview.addEventListener("click", async () => {
    const { value: text } = await Swal.fire({
        title: "Deja tu reseña",
        html: `
            <textarea id="reviewTextArea" placeholder="Deja aquí tu reseña..."></textarea>
            <div class="rating">
                <input value="5" name="rating" id="star5" type="radio">
                <label for="star5"></label>
                <input value="4" name="rating" id="star4" type="radio">
                <label for="star4"></label>
                <input value="3" name="rating" id="star3" type="radio">
                <label for="star3"></label>
                <input value="2" name="rating" id="star2" type="radio">
                <label for="star2"></label>
                <input value="1" name="rating" id="star1" type="radio">
                <label for="star1"></label>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: "Confirmar"
    });
    if (text) {
        /* Obtengo fecha actual en el formato TIMSTAMP */
        const fechaActual = new Date();
        const año = fechaActual.getFullYear();
        const mes = agregarCeroDelante(fechaActual.getMonth() + 1);
        const dia = agregarCeroDelante(fechaActual.getDate());
        const horas = agregarCeroDelante(fechaActual.getHours());
        const minutos = agregarCeroDelante(fechaActual.getMinutes());
        const segundos = agregarCeroDelante(fechaActual.getSeconds());
        const date = `${año}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;
        /*La función agregarCeroDelante asegura que los valores tengan un cero delante
        si son menores que 10 para mantener el formato de dos dígitos*/
        function agregarCeroDelante(valor) {
            return valor < 10 ? `0${valor}` : valor;
        }

        /* Obtengo el numero de estrellas selecionado y el texto de la reseña dejada por el usuario */
        const rating = document.querySelector('input[name="rating"]:checked');
        const ratingValue = rating ? rating.value : null;
        const review = document.getElementById("reviewTextArea").value;

        if (review == '' || ratingValue == null) {
            Swal.fire({
                title: "Rellena todos los datos",
                icon: "error", 
                showConfirmButton: false,
                timer: 2000,
              });
        }else{
            reviewToSend = {
                'comment':review,
                'rating':ratingValue,
                'date':date
            }
            fetch(url+'controller=API&action=apiInsertReview',{
                method: 'POST',
                body: JSON.stringify(reviewToSend),
                headers:{
                    'Content-Type': 'application/json; charset=UTF-8'
                }
            }).then( 
                data => {
                    console.log(data.text())
                    /*VACIO EL CONTENEDOR DE LAS REVIEWS */
                    containerReviews.innerHTML = "";
                    /*LLAMO A LA FUNCION DE MOSTRAR LAS REVIEWS PARA VERLAS + LA NUEVA (SIN RECARGAR) 
                    TENGO QUE HACER ESTO UNA VEZ ACABADO EL FETCH, EN EL .then, YA QUE SINO EJECUTA ANTES
                    LA VISTA DE LA PAGINA QUE EL INSERT DE LA API, Y NO SE VE LA NUEVA REVIEW*/
                    getReviews();
                        }
                )
           
        }
    }
});


const ratingFilter = document.getElementById("ratingFilter")
ratingFilter.addEventListener("click",async () =>{
    const { value: rating } = await Swal.fire({
        title: "Filtra según la valoración deseada",
        html: `
            <div class="rating justify-content-center">
                <input value="5" name="rating" id="star5" type="radio">
                <label for="star5"></label>
                <input value="4" name="rating" id="star4" type="radio">
                <label for="star4"></label>
                <input value="3" name="rating" id="star3" type="radio">
                <label for="star3"></label>
                <input value="2" name="rating" id="star2" type="radio">
                <label for="star2"></label>
                <input value="1" name="rating" id="star1" type="radio">
                <label for="star1"></label>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: "Confirmar"
    });
    if(rating){
        const rating = document.querySelector('input[name="rating"]:checked');
        // Obtén el valor del rating seleccionado, o establece null si no hay rating seleccionado
        const ratingValue = rating ? rating.value : null;
        if (ratingValue == null) {
            /*VACIO EL CONTENEDOR DE LAS REVIEWS */
            containerReviews.innerHTML = "";
            /* SI NO PONE NINGUN FILTRO MUESTRO TODAS LAS RESEÑAS */
            getReviews();
        }else{
            /*VACIO EL CONTENEDOR DE LAS REVIEWS */
            containerReviews.innerHTML = "";
            /* MUESTRO LAS REVIEWS CON EL FILTRO SELECCIONADO */
            getReviews(ratingValue);
        }
    }
})




/*FUNCION DONDE OBTENEMOS LAS REVIEWS CON LA API Y LAS MOSTRAMOS EN LA PAGINA "paginaReviews.php" */
function getReviews(filter=0){
    fetch(url+'controller=API&action=apiShowReviews')
        .then(response => response.json())
        .then(reviews => {
            console.log(reviews);
            if(filter != 0){
                reviews = reviews.filter(review=>review.rating == filter);
            }
            for(r of reviews){
                let reviewCard = document.createElement("div");
                reviewCard.classList.add("reviewCard");
    
                let reviewUser = r.user;
                let user = document.createElement("p");
                let boldUser = document.createElement("strong");
                boldUser.textContent = reviewUser;
                user.appendChild(boldUser);
                user.classList.add("me-3");
    
                //Mostramos la fecha en el formato deseado: "22 ene 2024"
                let reviewDate = r.date;
                const fecha = new Date(reviewDate);
                const opcionesFormato = { year: 'numeric', month: 'short', day: 'numeric' };
                const formatoFecha = new Intl.DateTimeFormat('es-ES', opcionesFormato).format(fecha);
                let date = document.createElement("p");
                date.textContent = formatoFecha;
    
                let reviewRating = r.rating;
                let rating = document.createElement("div");
                rating.classList.add("rating");
                /* FOR que nos muestra el numero de estrellas segun el rating puesto 
                por el usuario */
                for (let i = 0; i < reviewRating; i++) {
                    let star = document.createElement("span");
                    star.classList.add("star");
                    star.textContent = "★";
                    //Vamos añadiendo las estrellas al contenedor 'rating'
                    rating.appendChild(star);
                }
    
                let reviewComment = r.comment;
                let comment = document.createElement("p");
                comment.textContent = reviewComment;
                comment.classList.add("mt-3");
    
                let reviewTop = document.createElement("div");
                reviewTop.classList.add("reviewTop");
                let reviewTopLeft = document.createElement("div");
                reviewTopLeft.classList.add("reviewTopLeft");
    
                reviewTopLeft.appendChild(user);
                reviewTopLeft.appendChild(date);
                reviewTop.appendChild(reviewTopLeft);
                reviewTop.appendChild(rating);
                reviewCard.appendChild(reviewTop);
    
                reviewCard.appendChild(comment);
                containerReviews.appendChild(reviewCard);
            }
        })
        .catch(error => console.error('Error en la solicitud fetch:', error));
}