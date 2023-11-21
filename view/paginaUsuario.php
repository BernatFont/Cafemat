<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCuenta.css">
    <title>Pagina del usuario | Cafemat</title>
</head>
<body>
    <main class="px-4 mt-3">
        <section class="titulo">
            <h2>CUENTA</h2>
        </section>
        <section class="d-flex justify-content-center align-items-center flex-column my-3 datos">
            <img src="icon/acount.png" alt="" class="acount_logo mb-3">
            <form action="" method='post' class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?= $usuario->nombre ?>" class="form-control mb-3">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="<?= $usuario->apellido ?>" class="form-control mb-3">
                <label for="correo">Correo</label>
                <input type="text" name="correo" value="<?= $usuario->correo ?>" class="form-control mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" value="<?= $usuario->nombre_usuario ?>" class="form-control mb-3">
            </form>
        </section>
        <section class="d-flex align-items-center">
            <form action="<?= url."?controller=usuario&action=cerrarCuenta"?>" method="post">
                <button class="btn btn-danger my-4">Cerrar cuenta</button>
            </form>
            <?php if($usuario->nombre == 'admin'){?>
                <a href="<?= url."?controller=producto&action=panelControlAdmin"?>" class="btn btn-warning">Panel control</a>
                <?php } ?>
        </section>
    </main>
</body>
</html>