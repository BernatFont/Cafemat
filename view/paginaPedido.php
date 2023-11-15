<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Pedido</title>
</head>
<body>
    <h1>TU PEDIDO</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
        </tr>
    
    <?php

        if(!isset($_SESSION["carrito"])){

        }else{
            foreach ($_SESSION["carrito"] as $pedido) {?>
                <tr>
                    <td><?= $pedido->producto->producto_id ?></td>
                    <td><?= $pedido->producto->nombre ?></td>
                    <td><?= $pedido->producto->precio ?></td>
                    <td><?= $pedido->cantidad ?></td>
                </tr>
            
    
            <?php
            }
        }

    ?>
    </table>

    <form action="<?= url."?controller=producto&action=borrarPedido" ?>" method="post">
        <button class="btn btn-danger">Borrar todo el pedido</button>
    </form>

</body>
</html>