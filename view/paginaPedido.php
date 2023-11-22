<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylePedido.css">
    <title>Pedido</title>
</head>
<body>
    <main class="mx-4 mt-4">
    <?php

        if(empty($_SESSION["carrito"])){?>

            <section class="d-flex flex-column align-items-center my-5 nada_seleccionado">
                <h2>No has seleccionado ningún producto</h2>
                <p>Si quieres segir comprando, por favor haz clic <a href="<?= url."?controller=producto&action=carta"?>">aqui</a>.</p>
            </section>

        <?php }else{ ?>
            <section class="titulo d-flex align-items-center justify-content-between mb-4">
                <h2>Mi pedido</h2>
                <section>
                    <form action="<?= url."?controller=producto&action=borrarPedido" ?>" method="post">
                        <button class="paper_been"><img src="icon/paper-been.svg" alt=""></button>
                    </form>
                </section>
            </section>
        <section class="container-fluid">
            <section class="row">
                <section class="col-12 col-lg-9">
                    <table class="table">
                        <tr>
                            <th>Productos</th>
                            <th class="text-end">Precio unidad</th>
                            <th class="text-center cantidad">Cantidad</th>
                            <th class="text-end">Total</th>
                            <th></th>
                        </tr>

                        <?php 
                        $pos = 0;
                        foreach ($_SESSION["carrito"] as $pedido) {?>
                            
                            <tr>
                                <td class="d-flex">
                                    <img src="<?= $pedido->getProducto()->img ?>" alt="Imagen del producto" class="imagen_producto py-2 me-2">
                                    <div class="nombre_producto align-self-center ps-3"><?= strtoupper($pedido->getProducto()->nombre) ?></div>
                                </td>
                                <td class="text-end align-middle"><?= $pedido->getProducto()->precio.'€'?></td>
                                <td class="text-center align-middle">
                                    <form action="<?= url."?controller=producto&action=pedido" ?>" method="post" class="cantidad">
                                        <button name="add" value="<?= $pos ?>"><img src="icon/plus.png" alt=""></button>
                                        <input type="text" value="<?= $pedido->getCantidad() ?>">
                                        <button name="remove" value="<?= $pos ?>"><img src="icon/minus.png" alt=""></button>
                                    </form>
                                </td>
                                <td class="text-end align-middle"><?= $pedido->precioTotalProducto($pedido->getProducto()->precio).'€'?></td>
                                <td class="text-center align-middle">
                                    <form action="<?= url."?controller=producto&action=pedido" ?>" method="post">
                                        <input type="hidden" name="borrar" value="<?= $pos ?>">
                                        <button class="bt_eliminarProducto"><img src="icon/close.png" alt=""></button>
                                    </form>
                                </td>
                            </tr>
                            
                        <?php 
                        $pos++;
                        } ?>
                    </table>
                </section>
                
                <section class="col-12 col-lg-3">
                    <form action="" method="post">
                        <section class="metodo_pago d-flex flex-column px-3">
                            <h3 class="my-3 pb-3">Método de pago</h3>
                            <label for="pago_targeta" class="p-3 mx-3 d-flex align-items-center">
                                <input type="radio" name='pago_targeta'><span class="mx-3">Targeta</span><img src="icon/information.png" alt="icono de informacion" class="ms-auto">
                            </label>
                            <label for="pago_efectivo" class="p-3 mx-3 mb-4 d-flex align-items-center">
                                <input type="radio" name='pago_evectivo'><span class="mx-3">Efectivo</span><img src="icon/information.png" alt="icono de informacion" class="ms-auto">
                            </label>
                        </section>
                        <section class="alert alert-success">
                            <span>Precio total: <?= CalculadoraPrecios::calcularTotalPedido($_SESSION["carrito"]) ?>€</span>
                        </section>
                    </form>
                </section>

            </section>
        </section>
        <?php } ?>
    </main>
        
</body>
</html>