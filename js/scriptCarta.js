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
        checkboxesContainer.classList.add('d-flex', 'flex-column');

        nombresCat.forEach(categoria => {
            const checkbox = document.createElement('label');
            //creamos un checkbox por cada categoria
            checkbox.innerHTML = `<input type="checkbox" name="categorias" value="${categoria}"> ${categoria} </input>`;
            checkbox.classList.add('mb-2');
            //asociamos el checkbox al contenedor para los checkbox
            checkboxesContainer.appendChild(checkbox);
        });

        // Mostramos la ventana emergente de SweetAlert con el contenedor de checkboxes
        Swal.fire({
            title: 'Selecciona categorías',
            html: checkboxesContainer,
            confirmButtonText: 'Aceptar',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                // Aquí puedes obtener los valores seleccionados
                const checkboxes = checkboxesContainer.querySelectorAll('input[name="categorias"]');
                let nonChecked = [];
                checkboxes.forEach((checkbox)=>{
                    if (!checkbox.checked) {
                        nonChecked.push(checkbox);
                    }
                })
                //Creo un array con el valor (nombre de la categoria) de los checkbox checkeados
                const selectedCategorias = Array.from(nonChecked).map(checkbox => checkbox.value);
                return selectedCategorias;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                /*Ates de aplicar el dysplay:none a los contenedores pertinentes, reestablecemos los
                contenedores, para que en caso de haber aplicado anteriormente el filtro, quitar el dysplay:none
                a los contenedores aplicados */
                nombresCat.forEach((cat)=>{
                    const contenedorCat = document.getElementById(cat);
                    /* la clase mt-5 es la unica que contienen los contenedores, es de BOOTSTRAP */
                    contenedorCat.className = "mt-5";
                })

                //Obtenemos los valores de las categorias NO checkeadas que son los ID del contenedor
                const selectedCategorias = result.value;
                console.log("Num de categorias NO seleccionadas: "+selectedCategorias.length);

                /*A cada una de las categorias NO checkeadas le aplicamos una clase, que es dysplay:none,
                eliminando el contenedor para no mostrarlo*/
                selectedCategorias.forEach((categoria)=>{
                    const contenedorCat = document.getElementById(categoria);
                    contenedorCat.classList.add("noneCat");
                })
                console.log('Categorías NO seleccionadas:'+ selectedCategorias);

                /* En el caso de que no se seleccione ni una categoria se muestran todas */
                if(selectedCategorias.length == nombresCat.length){
                    nombresCat.forEach((cat)=>{
                        const contenedorCat = document.getElementById(cat);
                        /* la clase mt-5 es la unica que contienen los contenedores, es de BOOTSTRAP */
                        contenedorCat.className = "mt-5";
                    })
                }
            }
        });



        //const categorias = Swal.fire(nombresCat[0]);
    })
    .catch(error => console.error('Error en la solicitud fetch:', error));

})