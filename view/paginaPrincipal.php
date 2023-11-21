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
            <section class="banner1 d-flex col-6 col-sm-6 col-md-8 ">
                <p class="slogan m-3">Sabores que construyen momentos inolvidables</p>
                <a href="<?= url."?controller=producto&action=carta"?>" class="align-self-end">
                    <button class="bt_frase_preparar">
                        <p class="frase_preparar"><img src="icon/right-arrow.png" alt="" class="right_row"> Prepara tu pedido</p>
                    </button>
                </a>
            </section>
            <section class="banner2 col-6 col-sm-6 col-md-4"></section>
        </section>

        <section class="row sec_1 mx-3">
            <section class="d-flex justify-content-evenly p-5 mt-3  ">
                <form action="<?= url."?controller=producto&action=carta"?>" method='post'>
                    <input type="hidden" value='<?= $usuario?>' name='usuario'>
                    <button class="sec_1_bt" id="boton_sec1">
                        <img src="icon/fork.png" alt="icono de un tenedor y una cuchara cruzados" class="sec1_bt_icon">
                        <img src="icon/fork_orange.png" alt="icono de un tenedor y una cuchara cruzados" class="sec1_bt_icon2">
                        <p>Carta</p>
                    </button>
                </form>
                <form action="<?= url."?controller=producto&action=pedido"?>" method='post'>
                    <input type="hidden" value='<?= $usuario?>' name='usuario'>
                    <button class="sec_1_bt" id="boton2_sec1">
                        <img src="icon/cart.png" alt="icono de una bolsa de pedidos" class="sec1_bt_icon2_1">
                        <img src="icon/paper-bag-orange.png" alt="icono de una bolsa de pedidos" class="sec1_bt_icon2_2">
                        <p>Pedido</p>
                    </button>
                </form>
            </section>
        </section>

        <section class="sec_2 d-flex flex-column align-items-center mx-3">
            <h2 class="my-4">Categorías</h2>
            <section class="container-fluid d-flex justify-content-evenly flex-wrap categorias">
                <section class="cat1">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#almuerzo"?>">ALMUERZO</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/almuerzo.jpg" alt="un café con cruisant">
                    </section>
                </section>
                <section class="cat2">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#para_comer"?>">PARA COMER</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/combi1.jpg" alt="plato con un huevo, ensalada, patatas fritas y lomo">
                    </section>
                </section>
                <section class="cat1">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#bebida"?>">BEBIDA</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/bebida.webp" alt="refrescos">
                    </section>
                </section>
                <section class="cat2">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="<?= url."?controller=producto&action=carta#postre"?>">POSTRE</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/postre.jpg" alt="tarta de queso">
                    </section>
                </section>
            </section>
        </section>

        <section class="d-flex flex-column align-items-center mx-5">
            <h2 class="mt-4">Productos destacados</h2>
            <section class="container-fluid d-flex justify-content-evenly flex-wrap destacados">
                
                <?php
                    foreach($productos as $producto){?>
                        <section class="producto_destacado">
                            <section class="d-flex justify-content-center">
                                <img src="<?= $producto->img ?>" alt="">
                            </section>
                            <section class="mb-4 producto_destacado_bottom d-flex flex-column">
                                <p class="my-3"><?= strtoupper($producto->nombre) ?></p>
                                
                                <?php 
                                    $precio = $producto->precio;
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
                            </section>
                        </section>
                    <?php } ?>

            </section>
        </section>
        

        <section class="compromisos row">
            <h3 class="mt-4 text-center">Nuestros compromisos</h3>
            <section class="d-flex justify-content-evenly my-4">
                <img src="icon/los_mejores_precios.png" alt="">
                <img src="icon/maxima_rapidez.png" alt="">
                <img src="icon/calidad_profesional.png" alt="">
            </section>

        </section>

    </main>
    <footer>

    </footer>

</body>
</html>