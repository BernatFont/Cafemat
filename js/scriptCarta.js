/*Obtenemos la ruta almacenada en el localStorage cuando entramos a la pagina */
const url = localStorage.getItem('urlPath');

const categoryFilter = document.getElementById("categoryFilter");
categoryFilter.addEventListener("click",()=>{

    fetch(url+'controller=categoria&action=getNombreCategorias')
    .then(response => response.json())
    .then(nombresCat => {
        console.log(nombresCat);


        // Creamos un contenedor de checkboxes
        const checkboxesContainer = document.createElement('div');
        checkboxesContainer.id = 'categorias-container';

        nombresCat.forEach(categoria => {
            const checkbox = document.createElement('label');
            //
            checkbox.innerHTML = `<input type="checkbox" name="categorias" value="${categoria}"> ${categoria} </input>`;
            checkboxesContainer.appendChild(checkbox);
        });

        // Mostramos la ventana emergente de SweetAlert con el contenedor de checkboxes
        Swal.fire({
            title: 'Selecciona Categorías',
            html: checkboxesContainer,
            confirmButtonText: 'Aceptar',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                // Aquí puedes obtener los valores seleccionados
                const checkboxes = checkboxesContainer.querySelectorAll('input[name="categorias"]:checked');
                const selectedCategorias = Array.from(checkboxes).map(checkbox => checkbox.value);
                return selectedCategorias;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes hacer algo con las categorías seleccionadas
                const selectedCategorias = result.value;
                console.log('Categorías seleccionadas:', selectedCategorias);
            }
        });



        //const categorias = Swal.fire(nombresCat[0]);
    })
    .catch(error => console.error('Error en la solicitud fetch:', error));

})