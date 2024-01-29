/*Obtenemos la ruta almacenada en el sessionStorage cuando entramos a la pagina */
const url = sessionStorage.getItem('urlPath');

// <<< VALIDACION DEL PEDIDO CON LAS PROPINAS
const buttonValidarPedido = document.getElementById("validar_pedido");
buttonValidarPedido.addEventListener("click", async (event) => {
    // Evitar que el formulario se envíe y recargue la página
    event.preventDefault();
    //Establecemos las propinas que se podran dar
    const inputOptions = {
        "3": "3%",
        "5": "5%",
        "10": "10%",
        "1": "Sin propina"
    };
    //Obtenemos el precio total sin propina del pedido
    const precioTotal = document.getElementById("precio_total").innerText;
    /* Desactivar scroll lateral y establecer el ancho del body al 100% 
    para no ver un espavio en blanco*/
    document.body.style.overflow = 'hidden';
    document.body.style.width = '100%';
    //Ventana donde pondremos la propina que queremos dejar
    const { value: tip, dismiss } = await Swal.fire({
        title: "Propina",
        input: "radio",
        inputOptions,
        inputValue: "3", // Establecer la opción "3%" como seleccionada por defecto
        showCancelButton: true, // Mostrar el botón de cancelar
        cancelButtonText: 'Cancelar', // Texto para el botón de cancelar
        confirmButtonText: "Siguiente"
    });
    //Si confirmamos la operacion nos aparece otra ventana
    //Aqui se muestra el coste del pedido, de la propina y de los dos juntos
    if (tip) {
        tipCost = (tip * parseFloat(precioTotal))/100;
        tipCost = Math.round(tipCost*100)/100;
        precioFinal = parseFloat(precioTotal) + tipCost;
        precioFinal = Math.round(precioFinal*100)/100
        tipCost = tipCost.toFixed(2);
        precioFinal = precioFinal.toFixed(2)
        if (tip == "1"){
            tipCost = 0;
            precioFinal = parseFloat(precioTotal);
            precioFinal = precioFinal.toFixed(2);
        }
        const confirm = await Swal.fire({
            title: '¿Estás seguro?',
            text: 'Por favor, confirma que deseas realizar el pedido con la propina seleccionada.',
            html: `<label>Precio pedido: ${precioTotal}   Propina: ${tipCost}€</label><br><br><h3><b> ${precioFinal}€ </b></h3>`,
            showCancelButton: true,
            confirmButtonText: 'Confirmar pedido'
        });
        //Si confirmamos el pedido, lo creara, enviando la propina por GET
        if (confirm.isConfirmed){
            Swal.fire({
                icon: "success",
                title: "Pedido realizado!",
                showConfirmButton: false,
                timer: 2000,
                //Cuando se cierre la ventana echa por swetalert, ejecutara el siguiente codigo
                didClose: () => {
                    // Construir la URL correctamente (paso la propina por GET)
                    const queryString = `?controller=pedido&action=validarPedido&tip=${tipCost}`;
                    // Vamos a la URL deseada
                    window.location.href = url + queryString;
                }
            });
        //Construir la URL correctamente (paso la propina por GET)
            const queryString = `?controller=pedido&action=validarPedido&tip=${tipCost}`;
        //Vamos a la URL deseada
        window.location.href = url + queryString;
        //Si no confirma el pedido, se cancela
        } else {
            // Si el usuario no confirma, se cancela la operacion
            Swal.fire({
                icon: "error",
                title: "Pedido cancelado",
                showConfirmButton: false,
                timer: 1000,
            });
        }
    } else if (dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
            icon: "error",
            title: "Has cancelado la operación",
            showConfirmButton: false,
            timer: 1000,
        });
    }
    //Volvemos a poner el scroll visible, sino se queda oculto
    document.body.style.overflow = 'visible';
});

// VALIDACION DEL PEDIDO CON LAS PROPINAS >>>