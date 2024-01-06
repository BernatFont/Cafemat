<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCarta.css">
    <title>Carta Admin</title>
</head>

<body>
    <div class="px-4 mt-3">
        <div id="titulo">
            <h2 class="TTBold_32">PRODUCTOS</h2>
        </div>
        <section class="container mt-4">
            <div class="row" style="max-height: 70vh; overflow:auto">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="del">ID</th>
                        <th scope="col" class="del">IMG</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            
                        foreach ($productos as $producto) {?>
                
                             <tr>
                                <td class="del"><?= $producto->getProducto_id(); ?></td>
                                <td class="del"><img src="<?= $producto->getImg(); ?>" alt="imagen del producto" class="product_img"></td>
                                <td><?=  $producto->getNombre(); ?></td>
                                <td><?=  $producto->getPrecio().' €'; ?></td>
                                <td><?=  $producto->getCategoria(); ?></td>
                                <td>
                                    <form action="<?= url."?controller=producto&action=modificar" ?>" method="post">
                                        <input type='hidden' name='id' value="<?= $producto->getProducto_id(); ?>" >
                                        <button class="bt bt_editar py-1 px-2">Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= url."?controller=producto&action=panelControlAdmin"?>" method="post">
                                        <input type='hidden' name='id' value="<?= $producto->getProducto_id(); ?>" >
                                        <button class="bt bt_eliminar py-1 px-2" name="eliminar_producto">Eliminar</button>
                                    </form>
                                </td>
                            </tr> 
                                
                        <?php } ?>
                </tbody>
                </table>
            </div>
            <div class="row mb-5 mt-4">
                <form action="<?= url."?controller=producto&action=crear"?>" method='post'>
                    <button class='bt bt_crear py-2 px-2'>Crear producto</button>
                </form>
            </div>
        </section>
        <div id="titulo">
            <h2 class="TTBold_32">PEDIDOS</h2>
        </div>
        <section class="container mt-4">
            <div class="row mb-5" style="max-height: 70vh; overflow:auto">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">USUARIO</th>
                        <th scope="col">FECHA INICIO</th>
                        <th scope="col">HORA</th>
                        <th scope="col" class="text-center">BULTOS</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col" class="del">ESTADO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            
                        foreach ($pedidos as $pedido) {?>
                
                             <tr>
                                <td><?= $pedido->usuario; ?></td>
                                <td><?= $pedido->fecha_inicio; ?></td>
                                <td><?=  $pedido->hora; ?></td>
                                <td class="text-center"><?=  $pedido->cantidad_bultos; ?></td>
                                <td><?=  number_format($pedido->coste,2).' €'; ?></td>
                                <td class="del"><?=  $pedido->estado; ?></td>
                                <?php
                                    if($pedido->estado == 'pendiente'){?>
                                        <td>
                                            <form action="<?= url."?controller=producto&action=panelControlAdmin" ?>" method="post">
                                                <input type='hidden' name='id' value="<?= $pedido->pedido_id; ?>" >
                                                <button name="enviar_pedido" class="bt bt_editar py-1 px-2">Enviar</button>
                                            </form>
                                        </td>
                                    <?php }else{ ?>
                                        <td><img src="icon/check.png" alt="icono de un tick"></td>
                                    <?php } ?>
                            </tr> 
                                
                        <?php } ?>
                </tbody>
                </table>
            </div>
        </section>

    </div>
</body>
</html>