<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="<?= url.'?controller=producto&action=crearProducto' ?>" method='post' class="form-group p-5">
            <label for="IMG">URL de la IMG</label>
            <input type="text" name="img" class="form-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control"> 
            <label for="precio">Precio</label>
            <input type="text" pattern="[0-9,]*" name="precio" class="form-control">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" class="form-control">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" class="form-control">
            <button class="btn btn-primary mt-3">Enviar</button>
        </div>
</body>
</html>