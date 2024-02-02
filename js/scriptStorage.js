/* Ponemos la ruta en localStorage al entrar a la página web
para así tenerla guardada para cuando la necesite */
const url = 'http://bernatdaw2.com/Proyecto_1/Cafemat/?';
localStorage.setItem('urlPath', url);
console.log(url);

/* Llamamos a la funcion para obtener el usuario */
obtenerUsuarioActual();

/* FUNCION ASINCRONA PARA OBTENER EL USUARIO ACTUAL */
async function obtenerUsuarioActual() {
    try {
        const response = await fetch(url + 'controller=usuario&action=usuarioActualYpuntos');
        const usuarioConPuntos = await response.json();
        console.log(usuarioConPuntos);

        // Guardar el usuario en localStorage
        sessionStorage.setItem('usuarioYpuntos', JSON.stringify(usuarioConPuntos));
        
        return usuarioConPuntos;
    } catch (error) {
        console.error('Error al obtener el usuario actual:', error);
        return null;
    }
}




