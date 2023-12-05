<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleLogRegister.css">
    <title>Crea una nueva cuenta de cliente | Cafemat</title>
</head>
<body>
    <main class="mt-4 d-flex justify-content-center">
        <section class="register_container d-flex flex-column">
            <h2 class="mb-5 text-center">Crea tu cuenta</h2>
            <?php if(isset($mensaje)){?>
                <div class="alert alert-danger"><?= $mensaje ?></div>
            <?php } ?>
            <form action="<?= url.'?controller=usuario&action=crearUsuario'?>" method="post" class="form_register d-flex flex-column">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="mb-3">
                <label for="apellido">Primer apellido</label>
                <input type="text" name="apellido" class="mb-3">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="mb-3">
                <label for="usuario">*Nombre usuario</label>
                <input type="text" name="usuario" class="mb-3" required>
                <label for="contra">*Contraseña</label>
                <input type="password" name="contra" required>
                <button type="submit" name="registrado" class="bt mt-5">Crear cuenta</button>
            </form>
            <a href="<?= url."?controller=usuario&action=inicioSesion"?>" class="align-self-center mt-5 mb-5 redirigir_inicio">¿Ya estas registrado/a? <span>Iniciar sesión</span></a>
        </section>
    </main>
</body>
</html>