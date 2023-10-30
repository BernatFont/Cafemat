<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    img{
        height:50px;
        width:auto;
    }

</style>

<body>
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IMG</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach ($productos as $producto) {?>
    
                 <tr>
                    <td><?= $producto->producto_id; ?></td>
                    <td><img src="<?= $producto->img; ?>" alt=""></td>
                    <td><?=  $producto->nombre; ?></td>
                    <td><?=  $producto->precio; ?></td>
                    <td><?=  $producto->categoria; ?></td>
                    <td><?=  $producto->descripcion; ?></td>
                    <td>
                        <form action="<?= url."?controller=producto&action=modificar" ?>" method="post">
                            <input type='hidden' name='id' value="<?= $producto->producto_id; ?>" >
                            <button class="btn btn-warning">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= url."?controller=producto&action=eliminar"?>" method="post">
                            <input type='hidden' name='id' value="<?= $producto->producto_id; ?>" >
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr> 
                    
            <?php } ?>
                
                
    </tbody>
    </table>
    <form action="<?= url."?controller=producto&action=crear"?>" method='post'>
        <button class='btn btn-success'>Crear producto</button>
    </form>
</body>
</html>