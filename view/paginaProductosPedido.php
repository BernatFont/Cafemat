<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylePedido.css">
    <title>Productos del pedido | Cafemat</title>
</head>
<body>
    <div class="container-fluid">
        <div id="titulo" class="mt-3">
            <h2 class="TTBold_32">Detalles del pedido</h2>
        </div>
        <section class="tabla_detalles px-0 px-lg-5 d-flex justify-content-center">
            <table class="table my-5">
                <tr>
                    <th class="col_1_detalles">Producto</th>
                    <th class="col_2_detall">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio unidad</th>
                    <th class="text-center">Precio total</th>
                </tr>
                <?php
                    foreach($productos as $producto){?>
                        <tr>
                            <td class="img_detalles col_1_detalles"><img src="<?= $producto->getImg() ?>" alt="Imagen del producto" ></td>
                            <td class="nombre_detalles col_2_detalles align-middle"><?= strtoupper($producto->getNombre()) ?></td>
                            <td class="align-middle text-center"><?= $producto->cantidad ?></td>
                            <td class="align-middle text-center"><?= number_format($producto->precio_unidad,2).'€' ?></td>
                            <td class="align-middle text-center"><?= number_format($producto->precio_total,2).'€' ?></td>
                        </tr>
                    <?php } ?>
            </table>
        </section>
    </div>
</body>
</html>