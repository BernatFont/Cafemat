# Proyecto JS | Cafemat

## Storage
El Storage se ha usado en dos situaciones diferentes, la primera, se ha usado localStorage para guardar la ruta raíz de la pagina web, para no estar repitiéndola todo el rato en las promesas fetch y la segunda, se ha usado sessionStorage para guardar el nombre del usuario y sus puntos, haciendo un fetch, para usarlos en JS.

## Reseñas
- Primero he creado una tabla en la BD para almacenar las reseñas creadas. A continuacion para obtener dichas reseñas y mostrarlas, uso un fetch que llama a una api creada en php (APIController.php), que me devuelve las reseñas ,haciendo un select a la BD, en formato JSON. Una vez las tengo las muestro en una nueva vista dedicada a las reseñas.

- En la vista de reseñas he añadido un botón para crear las reseñas, donde una vez rellenadas se envían a la api con fetch en formato JSON y se guardan a la BD para mostrarla reactivamente sin recargar la pagina. Cuando se crea una reseña correctamente, salta un aviso de Notice.js que nos dice que se ha añadido una reseña.

- En la pagina de reseñas se han añadido 2 botones mas que tienen la función de filtrar las reseñas según las preferencias del usuario. El primero filtra las reseñas con el numero de estrellas seleccionado. El segundo filtra ascendente o descendientemente según valoración.
# Programa de fidelidad
Como he dicho anteriormente uso sessionStorage para tener el usuario y sus puntos en JS. Para obtenerlos uso una promesa fetch que apunta al controlador de usuario, donde he creado una función que devuelve el usuario con sus puntos en formato JSON.
Estos puntos pueden ser usados al realizar un pedido para obtener descuentos. Los puntos se obtienen haciendo pedidos.
# QR
Para generar el QR nos alimentamos de una api externa (QRCode) que nos facilita la creación del mismo. Este se genera al realizar un pedido. Al escanearlo se ve la url que nos dirige al pedido realizado.
# Propinas
Para las propinas, he generado un popup (hecho con una libreria llamada SweetAlert), que salta cuando el usuario le da a validar el pedido, donde aparecen 4 opciones para seleccionar como propina, cuando seleccionas la opción deseada, aceptas la operación y te sale el precio final con la propina añadida, pudiendo usar los puntos que he comentado en el anterior punto.
# Filtro de productos
En el apartado de la carta he implementado un botón donde se pueden filtrar los productos según las categorías escogidas en dicho filtro. Al darle al botón salta un popup, hecho con sweeralert, que nos muestra una lista de checkbox, que son las categorías por las que puedes filtrar.
# Link pagina web
[Mi pagina web](https://bernatfont.bernat2024.es/)
# Problemas que he tenido
El principal problema ha sido el manejo del fetch, ya que era un nuevo método que no había usado. El primero ha sido que en el api de php no convertía/desconvertía a JSON correctamente y me saltaban muchos errores. El segundo ha sido que para obtener los datos, no sabia que tenia que hacer un echo para pasar los datos.
Otro gran problema ha sido la generación de reactividad aplicando los puntos del usuario. Quería que al aplicar los puntos, el precio cambiara reactivamente, y esta función ha sido difícil de resolver.
# Conclusión
Con este proyecto he adquirido grandes conceptos de JS, gracias, en parte a los diferentes problemas que han ido surgiendo durante el transcurso del mismo.
