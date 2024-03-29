<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylePedido.css">
    <link rel="stylesheet" href="library/sweetalert/sweetalert2.min.css">
    <title>Pedido del cliente | Cafemat</title>
</head>
<body>
    <main class="mx-4 mt-4">
    <?php

        if(empty($_SESSION["carrito"])){?>

            <section class="d-flex flex-column align-items-center my-5 nada_seleccionado">
                <h2>No has seleccionado ningún producto</h2>
                <p>Si quieres realizar un pedido, por favor haz clic <a href="<?= url."?controller=producto&action=carta"?>">aqui</a>.</p>
            </section>
            <section class="d-flex flex-column align-items-center">
                <?php
                if(isset($mensaje)){?>
                    <div class="alert alert-warning"><?= $mensaje ?></div>
                <?php } ?>
                <?php
                    if(isset($_SESSION['usuario'])){?>
                        <form action="<?= url."?controller=pedido&action=recuperarPedido" ?>" method="post" class="d-flex recuperar_pedido">
                            <button class="bt py-2 px-3 mb-4">Recuperar último pedido</button>
                        </form>
                    <?php } ?>
            </section>

        <?php }else{ ?>
        <section class="titulo d-flex align-items-center justify-content-between mb-4">
            <h2>Mi pedido</h2>
            <div>
                <form action="<?= url."?controller=producto&action=pedido"?>" method="post">
                    <div class="div_bin d-flex align-items-center justify-content-center"><button class="paper_bin" name="eliminar_pedido"><img src="icon/paper-been.svg" alt="icono de una papelera"></button></div>
                </form>
            </div>
        </section>
        <section class="container-fluid">
            <section class="row">
                <section class="col-12 col-lg-9">
                    <table class="table">
                        <tr>
                            <th class="col_1">Productos</th>
                            <th class="col_2">Productos</th>
                            <th class="text-end precio_unidad">Precio unidad</th>
                            <th class="text-center cantidad">Cantidad</th>
                            <th class="text-end">Total</th>
                            <th></th>
                        </tr>

                        <?php 
                        if(isset($mensaje)){?>
                            <div class="alert alert-warning"><?= $mensaje ?></div>
                        <?php } 
                        $pos = 0;
                        foreach ($_SESSION["carrito"] as $pedido) {?>
                                <tr class="fila_producto">
                                    <td class="col_1">
                                        <div class="imagen_producto my-3"><img src="<?= $pedido->getProducto()->getImg() ?>" alt="Imagen del producto" class="producto_imagen"></div>
                                    </td>
                                    <td>
                                        <div class="my-3 nombre_producto d-flex align-items-center"><span><?= strtoupper($pedido->getProducto()->getNombre()) ?></span></div>
                                    </td>
                                    <td class="text-end align-middle precio_unidad">
                                        <?= $pedido->getProducto()->getPrecio().'€'?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="<?= url."?controller=producto&action=pedido" ?>" method="post" class="cantidad">
                                            <button name="remove" value="<?= $pos ?>"><img src="icon/minus.png" alt="icono del menos para restar productos"></button>
                                            <input type="text" value="<?= $pedido->getCantidad() ?>">
                                            <button name="add" value="<?= $pos ?>"><img src="icon/plus.png" alt="icono del mas para sumar productos"></button>
                                        </form>
                                    </td>
                                    <td class="text-end align-middle"><?= $pedido->precioTotalProducto($pedido->getProducto()->getPrecio()).'€'?></td>
                                    <td class="text-center align-middle">
                                        <form action="<?= url."?controller=producto&action=pedido" ?>" method="post">
                                            <input type="hidden" name="borrar" value="<?= $pos ?>">
                                            <button class="bt_eliminarProducto"><img src="icon/close.png" alt="icono para eliminar el producto del pedido"></button>
                                        </form>
                                    </td>
                                </tr>
                        <?php 
                        $pos++;
                        } ?>
                    </table>
                </section>
                
                <section class="col-12 col-lg-3">
                <!-- <?= url."?controller=pedido&action=validarPedido" ?> -->
                    <form action="" class="d-flex flex-column">
                        <section class="metodo_pago d-flex flex-column px-3 mb-3">
                            <h3 class="my-3 pb-3">Método de pago</h3>
                            <label for="pago_targeta" class="p-3 d-flex align-items-center">
                                <input type="radio" name='pago_targeta'><span class="mx-3">Targeta</span><img src="icon/information.png" alt="icono de informacion" class="ms-auto">
                            </label>
                            <label for="pago_efectivo" class="p-3 mb-4 d-flex align-items-center">
                                <input type="radio" name='pago_evectivo'><span class="mx-3">Efectivo</span><img src="icon/information.png" alt="icono de informacion" class="ms-auto">
                            </label>
                        </section>
                        <section class="precio_total p-3 mb-3 d-flex flex-column">
                            <span class="underline px-3 py-3 d-flex justify-content-between">
                                <span>Total sin IVA</span>
                                <span><?= number_format(CalculadoraPrecios::calcularPrecioSinIVA($_SESSION["carrito"])[0],2) ?> €</span>
                            </span>
                            <span class="underline px-3 py-3 d-flex justify-content-between">
                                <span>IVA</span>
                                <span><?= number_format(CalculadoraPrecios::calcularPrecioSinIVA($_SESSION["carrito"])[1],2) ?> €</span>
                            </span>
                            <span class="px-3 py-2 d-flex justify-content-between">
                                <span>Total</span>
                                <span id="precio_total"><?= number_format(CalculadoraPrecios::calcularTotalPedido($_SESSION["carrito"]),2) ?>€</span>
                            </span>
                        </section>
                        <button class="bt py-2 mb-4" id="validar_pedido">Validar pedido</button>
                    </form>
                    <?php
                        if(isset($_SESSION['usuario'])){?>
                            <form action="<?= url."?controller=pedido&action=recuperarPedido" ?>" method="post" class="d-flex recuperar_pedido">
                                <button class="bt py-2 mb-4">Recuperar último pedido</button>
                            </form>
                        <?php } ?>
                </section>

            </section>
        </section>
        <?php } ?>
    </main>

    <script src="library/sweetalert/sweetalert2.min.js"></script>
    <script src="library/sweetalert/cleave.min.js"></script>
    <script src="library/sweetalert/addons/cleave-phone.i18n.js"></script>
    <script src="js/scriptPedido.js"></script>
</body>
</html>