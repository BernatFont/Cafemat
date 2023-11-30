<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Producto</title>
</head>
<body>
    <section>
        <form action="<?= url.'?controller=producto&action=panelControlAdmin' ?>" method='post' class="form-group p-5">
            <label for="id">Producto_id</label>
            <input type="hidden" name="id" value=<?= $producto->getProducto_id() ?> class="form-control">
            <label for="IMG">IMG</label>
            <input type="text" name="img" value=<?= $producto->getImg() ?> class="form-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value=<?= $producto->getNombre() ?> class="form-control"> 
            <label for="precio">Precio</label>
            <input type="text" pattern="^\d+(\.\d+)?$" name="precio" value=<?= number_format($producto->getPrecio(),2) ?> class="form-control">
            <label for="categoria">Categoria</label>
            <select name="categoria" class="form-select">
                <?php
                    foreach($categorias as $categoria){?>

                        <option value="<?= $categoria->getCategoria_id() ?>"><?= $categoria->getNombre() ?></option>

                <?php } ?>
            </select>
            <button class="btn btn-primary mt-3" name="editar_producto">Enviar</button>
        </form>
    </section>
</body>
</html>