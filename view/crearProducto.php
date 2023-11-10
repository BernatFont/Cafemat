<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Crear Producto</title>
</head>
<body>
    <header>

    </header>

    <section>
        <form action="<?= url.'?controller=producto&action=crearProducto' ?>" method='post' class="form-group p-5">
            <label for="IMG">URL de la IMG</label>
            <input type="text" name="img" class="form-control" placeholder="img/bocadillo1.png">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Bocadillo de lomo"> 
            <label for="precio">Precio</label>
            <input type="text" pattern="^\d+(\.\d+)?$" name="precio" class="form-control" placeholder="5.50">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" class="form-control" placeholder="Para comer">
            <button class="btn btn-primary mt-3">Enviar</button>
        </form>
    </section>

    <footer>

    </footer>
</body>
</html>