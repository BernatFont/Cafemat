const url = 'http://bernatdaw2.com/Proyecto_1/Cafemat/';

let resultado = fetch(url+"?controller=API&action=api")
.then( reviews => reviews.json())
.then( resultado => console.log(resultado) );