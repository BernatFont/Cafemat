<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Crear Producto | Cafemat</title>
</head>
<body>
    <section>
        <form action="<?= url.'?controller=producto&action=panelControlAdmin' ?>" method='post' class="form-group p-5">
            <label for="IMG">URL de la IMG</label>
            <input type="text" name="img" class="form-control" placeholder="img/bocadillo1.png" required>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Bocadillo de lomo" required> 
            <label for="precio">Precio</label>
            <input type="text" pattern="^\d+(\.\d+)?$" name="precio" class="form-control" placeholder="5.50" required>
            <label for="categoria">Categoria</label>
            <select name="categoria" class="form-select">
                <?php
                    foreach($categorias as $categoria){?>

                        <option value="<?= $categoria->getCategoria_id() ?>"><?= $categoria->getNombre() ?></option>

                <?php } ?>
            </select>
            <button class="bt px-3 py-2 mt-3" name="crear_producto">Enviar</button>
        </form>
    </section>
</body>
</html>