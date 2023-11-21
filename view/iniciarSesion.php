<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleLogRegister.css">
    <title>Login del cliente | Cafemat</title>
</head>
<body>
    <header>

    </header>

    <main class="mt-4 mb-5 d-flex justify-content-center">
        <section class="d-flex flex-column">
            <section>
                <h2 class="mb-5">¿Tienes ya una cuenta CAFEMAT?</h2>
                <form action="<?= url.'?controller=usuario&action=validarSesion'?>" method='post' class="form_login d-flex flex-column">
                    <label for="usuario">*Usuario</label>
                    <input type="text" name="usuario" requiered class="mb-3">
                    <label for="password">*Contraseña</label>
                    <input type="password" name="password" requiered class="mb-5">
                    <input type="submit" value="Iniciar sesión" name="iniciar_sesion" class="bt">
                </form>
            </section>
            <section class="mt-5 pt-4 d-flex flex-column align-items-center text-center ir_registro">
                <h3 class="pb-2 ">¿Aún no tienes una Cuenta?</h3>
                <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=usuario&action=registro" class="bt">Crea tu cuenta</a>
            </section>
        </section>

    </main>

    <footer>

    </footer>
</body>
</html>