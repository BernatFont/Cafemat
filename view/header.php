<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/headerFooter.css">
</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 nav_1">
        <div class="container-fluid d-flex justify-content-start">
            <a href="<?= url."?controller=producto&action=index "?>"><img src="icon/logo.svg" alt="" class="logo"></a>
            <form class="d-flex buscador ms-3" role="search">
                <img src="icon/lupa.svg" alt="" class="mx-2">
                <input placeholder="¿Que necesitas hoy?">
            </form>
            <form action="<?= url."?controller=usuario&action=inicioSesion" ?>" class="d-flex align-items-center ms-auto" method="post">
                <button class="icon d-flex align-items-center"><img src="icon/user_icon.svg" alt="">
                <p class="m-0 ms-2 icon_p">Mi cuenta</p>
            </button>
            </form>
            <form action="<?= url."?controller=producto&action=pedido" ?>"  class="d-flex carrito align-items-center" method="post">
                <button class="icon d-flex align-items-center">
                    <img src="icon/paper-bag-white.png" alt="">
                    <p class="m-0 ms-2 icon_p">Pedido</p>
                </button>
            </form>
        </div>
        </nav>
    
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 nav_2">
        <div class="container-fluid">
            <button class="navbar-tog responsive_bt" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="icon/burguer.svg" alt=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navegador">
                <li class="nav-item py-1">
                    <a class="nav-link disabled" disabled href="#">Categorías</a>
                </li>
                <li class="nav-item py-1">
                    <a class="nav-link disabled" disabled href="#">Soluciones</a>
                </li>
                <li class="nav-item py-1">
                    <a class="nav-link disabled" disabled href="#">Marcas</a>
                </li>
                <li class="nav-item py-1">
                    <a class="nav-link disabled" disabled href="#">Asesoramiento</a>
                </li>
                <li class="nav-item py-1 campo">
                    <a class="nav-link active" href="<?= url."?controller=producto&action=index"?>">Cafemat</a>
                </li>
                <li class="nav-item py-1 campo">
                    <a class="nav-link active" href="<?= url."?controller=producto&action=carta"?>">Carta</a>
                </li>
            </ul>
        </div>
        </nav>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>