<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleCarta.css">
    <title>Carta Admin</title>
</head>

<body>
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
                            <td class="del"><?= $producto->producto_id; ?></td>
                            <td class="del"><img src="<?= $producto->img; ?>" alt="" class="product_img"></td>
                            <td><?=  $producto->nombre; ?></td>
                            <td><?=  $producto->precio.'€'; ?></td>
                            <td><?=  $producto->categoria_nombre; ?></td>
                            <td>
                                <form action="<?= url."?controller=producto&action=modificar" ?>" method="post">
                                    <input type='hidden' name='id' value="<?= $producto->producto_id; ?>" >
                                    <button class="bt bt_editar py-1 px-2">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?= url."?controller=producto&action=panelControlAdmin"?>" method="post">
                                    <input type='hidden' name='id' value="<?= $producto->producto_id; ?>" >
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
</body>
</html>