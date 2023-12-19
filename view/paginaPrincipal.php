<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cafemat</title>
</head>
<body>
    <main class="container-fluid">

        <section class="banner row">
            <div class="banner1 d-flex col-6 col-sm-6 col-md-8 ">
                <p class="slogan m-3">Sabores que construyen momentos inolvidables</p>
                <a href="<?= url."?controller=producto&action=carta"?>" class="align-self-end">
                    <button class="bt_frase_preparar">
                        <p class="frase_preparar"><img src="icon/right-arrow.png" alt="flecha a la derecha azul" class="right_row"> Prepara tu pedido</p>
                    </button>
                </a>
            </div>
            <div class="banner2 col-6 col-sm-6 col-md-4"></div>
        </section>

        <section class="row sec_1 mx-3">
            <div class="d-flex justify-content-evenly p-5 mt-3  ">
                <form action="<?= url."?controller=producto&action=carta"?>" method='post'>
                <?php
                if(isset($user)){?>
                    <input type="hidden" value='<?= $user->getUsuario_id()?>' name='usuario'>
                <?php } ?>
                    <button class="sec_1_bt" id="boton_sec1">
                        <img src="icon/fork.png" alt="icono de un tenedor y una cuchara cruzados" class="sec1_bt_icon">
                        <img src="icon/fork_orange.png" alt="icono de un tenedor y una cuchara cruzados" class="sec1_bt_icon2">
                        <p>Carta</p>
                    </button>
                </form>
                <form action="<?= url."?controller=producto&action=pedido"?>" method='post'>
                <?php
                if(isset($user)){?>
                    <input type="hidden" value='<?= $user->getUsuario_id()?>' name='usuario'>
                <?php } ?>
                    <button class="sec_1_bt" id="boton2_sec1">
                        <img src="icon/cart.png" alt="icono de una bolsa de pedidos" class="sec1_bt_icon2_1">
                        <img src="icon/paper-bag-orange.png" alt="icono de una bolsa de pedidos" class="sec1_bt_icon2_2">
                        <p>Pedido</p>
                    </button>
                </form>
            </div>
        </section>

        <section class="sec_2 d-flex flex-column align-items-center mx-3">
            <h2 class="my-4">Categorías</h2>
            <div class="container-fluid d-flex justify-content-evenly flex-wrap categorias">
                <div class="cat1">
                    <div class="pt-1 ps-2 cat1_1">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#Almuerzo"?>">ALMUERZO</a>
                    </div>
                    <div class="img_sec_2 px-3 py-2">
                        <img src="img/almuerzo.jpg" alt="un café con cruisant">
                    </div>
                </div>
                <div class="cat2">
                    <div class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#Para comer"?>">PARA COMER</a>
                    </div>
                    <div class="img_sec_2 px-3 py-2">
                        <img src="img/combi1.jpg" alt="plato con un huevo, ensalada, patatas fritas y lomo">
                    </div>
                </div>
                <div class="cat1">
                    <div class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#Bebida"?>">BEBIDA</a>
                    </div>
                    <div class="img_sec_2 px-3 py-2">
                        <img src="img/bebida.webp" alt="refrescos">
                    </div>
                </div>
                <div class="cat2">
                    <div class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#Postre"?>">POSTRE</a>
                    </div>
                    <div class="img_sec_2 px-3 py-2">
                        <img src="img/postre.jpg" alt="tarta de queso">
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-column align-items-center mx-5">
            <h2 class="my-4">Productos destacados</h2>
            <div class="container-fluid d-flex justify-content-evenly flex-wrap destacados">
                
                <?php
                    foreach($productos as $producto){?>
                        <div class="producto_destacado">
                            <div class="d-flex justify-content-center">
                                <img src="<?= $producto->getImg() ?>" alt="">
                            </div>
                            <div class="mb-4 producto_destacado_bottom d-flex flex-column">
                                <p class="my-3"><?= strtoupper($producto->getNombre()) ?></p>
                                
                                <?php 
                                    $precio = $producto->getPrecio();
                                    $array_precio = explode(".", $precio);
                                ?>

                                <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                                
                                <span>
                                    <?php
                                        $precio_sin_IVA = $precio - (($precio * 10)/100);
                                        $array_sin_IVA = explode(".", $precio_sin_IVA);
                                    ?>
                                    <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                                </span>
                                <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#almuerzo" class="align-self-end">
                                    <button class="bt_compra">
                                        <span>+</span>
                                        <img src="icon/paper-bag-white.png" alt="" class="icono_compra">
                                    </button>
                                </a>
                            </div>
                    </div>
                    <?php } ?>

            </div>
        </section>
        

        <section class="compromisos row">
            <h3 class="mt-4 text-center">Nuestros compromisos</h3>
            <div class="d-flex justify-content-evenly my-4">
                <img src="icon/los_mejores_precios.png" alt="">
                <img src="icon/maxima_rapidez.png" alt="">
                <img src="icon/calidad_profesional.png" alt="">
            </div>

        </section>

    </main>
</body>
</html>