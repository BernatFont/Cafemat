<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylePedido.css">
    <title>Pedido</title>
</head>
<body>
    
    <?php

        if(empty($_SESSION["carrito"])){?>

            <section class="d-flex flex-column align-items-center my-5 nada_seleccionado">
                <h2>No has seleccionado ningún producto</h2>
                <p>Si quieres segir comprando, por favor haz clic <a href="<?= url."?controller=producto&action=carta"?>">aqui</a>.</p>
            </section>

        <?php }else{ ?>

        <h1>TU PEDIDO</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>Precio unidad</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
            </tr>

            <?php 
            $pos = 0;
            foreach ($_SESSION["carrito"] as $pedido) {?>
                
                <tr>
                    <td><?= $pedido->getProducto()->producto_id ?></td>
                    <td><?= $pedido->getProducto()->nombre ?></td>
                    <td><?= $pedido->getProducto()->precio.'€'?></td>
                    <td>
                        <form action="<?= url."?controller=producto&action=pedido" ?>" method="post" class="cantidad">
                            <button name="add" value="<?= $pos ?>"><img src="icon/plus.png" alt=""></button>
                            <input type="text" value="<?= $pedido->getCantidad() ?>">
                            <button name="remove" value="<?= $pos ?>"><img src="icon/minus.png" alt=""></button>
                        </form>
                    </td>
                    <td><?= $pedido->precioTotalProducto($pedido->getProducto()->precio).'€'?></td>
                    <td>
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

            <form action="<?= url."?controller=producto&action=borrarPedido" ?>" method="post" class="mt-4 mb-5">
                <button class="btn btn-danger">Borrar todo el pedido</button>
            </form>
        <?php } ?>
        
</body>
</html>