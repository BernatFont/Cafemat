<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Producto</title>
</head>
<body>
    <header>

    </header>

    <section>
        <form action="<?= url.'?controller=producto&action=editProducto' ?>" method='post' class="form-group p-5">
            <label for="id">Producto_id</label>
            <input type="hidden" name="id" value=<?= $producto->producto_id ?> class="form-control">
            <label for="IMG">IMG</label>
            <input type="text" name="img" value=<?= $producto->img ?> class="form-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value=<?= $producto->nombre ?> class="form-control"> 
            <label for="precio">Precio</label>
            <input type="text" pattern="^\d+(\.\d+)?$" name="precio" value=<?= $producto->precio ?> class="form-control">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" value=<?= $producto->categoria ?> class="form-control">
            <button class="btn btn-primary mt-3">Enviar</button>
        </form>
    </section>

    <footer>

    </footer>
</body>
</html>