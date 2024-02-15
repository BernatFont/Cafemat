/* QR */
const urlParams = new URLSearchParams(window.location.search);
console.log('QR: '+urlParams.get('QR'));


if (urlParams.get('QR')){
    /* Desactivar scroll lateral y establecer el ancho del body al 100% 
    para no ver un espavio en blanco*/
    document.body.style.overflow = 'hidden';
    document.body.style.width = '100%';
    
    let id_pedido = urlParams.get('QR');
    
    /* Creamos el contenedor del QR */
    const QRcontainer = document.createElement("div");
    QRcontainer.id = "qrcontainer";
    document.body.appendChild(QRcontainer);

    const theQR = new QRCode(QRcontainer);
    theQR.makeCode(url+'controller=pedido&action=verProductosPedido&pedido_id='+id_pedido);
    Swal.fire({
        title: 'QR del pedido',
        html: QRcontainer,
        showCancelButton: false,
        showConfirmButton: true,
        didRender: () => {
            // Estilos de centrado para el contenedor QRcontainer
            QRcontainer.style.display = "flex";
            QRcontainer.style.justifyContent = "center";
            QRcontainer.style.alignItems = "center";
        },
    }).then(() => {
        console.log('reload');
        window.location.href = url+'controller=usuario&action=inicioSesion';
    });
}
