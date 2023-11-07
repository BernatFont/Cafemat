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
    <header>

    </header>

    <main class="container-fluid">

        <section class="banner row">
            <section class="banner1 d-flex col-md-8 col-sm-12">
                <p class="slogan m-3">Sabores que construyen momentos inolvidables</p>
                <form action="<?= url."?controller=producto&action=pedido"?>" class="align-self-end">
                    <button class="bt_frase_preparar">
                        <p class="frase_preparar"><img src="icon/right-arrow.png" alt="" class="right_row"> Prepara tu pedido</p>
                    </button>
                </form>
            </section>
            <section class="banner2 col-md-4 col-sm-12"></section>
        </section>

        <section class="row sec_1 mx-3">
            <section class="d-flex justify-content-evenly p-5 mt-3  ">
                <form action="<?= url."?controller=producto&action=carta"?>" method='post'>
                    <button class="sec_1_bt">
                        <img src="icon/fork.png" alt="" class="sec1_bt_icon">
                        <p>Carta</p>
                    </button>
                </form>
                <form action="<?= url."?controller=producto&action=pedido"?>" method='post'>
                    <button class="sec_1_bt">
                        <img src="icon/cart.png" alt="" class="sec1_bt_icon">
                        <p>Pedido</p>
                    </button>
                </form>
            </section>
        </section>

        <section class="sec_2 d-flex flex-column align-items-center mx-3">
            <h2>Categorías</h2>
            <section class="container-fluid d-flex justify-content-evenly flex-wrap categorias">
                <section class="cat1">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#almuerzo">ALMUERZO</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/almuerzo.jpg" alt="">
                    </section>
                </section>
                <section class="cat2">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#para_comer">PARA COMER</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/combi1.jpg" alt="">
                    </section>
                </section>
                <section class="cat1">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#bebida">BEBIDA</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/bebida.webp" alt="">
                    </section>
                </section>
                <section class="cat2">
                    <section class="pt-1 ps-2">
                        <a class="bt_sec_2" href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#postre">POSTRE</a>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/postre.jpg" alt="">
                    </section>
                </section>
            </section>
        </section>

        <section class="d-flex flex-column align-items-center mx-5">
            <h2>Productos destacados</h2>
            <section class="container-fluid d-flex justify-content-evenly flex-wrap destacados">

                <section class="producto_destacado">
                    <section class="d-flex justify-content-center">
                        <img src="img/tostada_merme.jpg" alt="">
                    </section>
                    <section class="producto_destacado_bottom d-flex flex-column">
                        <p class="my-3">TOSTADAS CON MERMELADA</p>
                        <span><span>4</span>,50 € IVA incluido</span>
                        <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#almuerzo" class="align-self-end">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="" class="icono_compra">
                            </button>
                        </a>
                    </section>
                </section>

                <section class="producto_destacado">
                    <section class="d-flex justify-content-center">
                        <img src="img/bebida1.jpg" alt="">
                    </section>
                    <section class="producto_destacado_bottom d-flex flex-column">
                        <p class="my-3">COCACOLA</p>
                        <span><span>2</span>,00 € IVA incluido</span>
                        <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#bebida" class="align-self-end">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="" class="icono_compra">
                            </button>
                        </a>
                    </section>
                </section>

                <section class="producto_destacado">
                    <section class="d-flex justify-content-center">
                        <img src="img/combi2.jpg" alt="">
                    </section>
                    <section class="producto_destacado_bottom d-flex flex-column">
                        <p class="my-3">BUTIFARRA CON ALUBIAS</p>
                        <span><span>10</span>,50 € IVA incluido</span>
                        <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#para_comer" class="align-self-end">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="" class="icono_compra">
                            </button>
                        </a>
                    </section>
                </section>

                <section class="producto_destacado">
                    <section class="d-flex justify-content-center">
                        <img src="img/postre5.jpg" alt="">
                    </section>
                    <section class="producto_destacado_bottom d-flex flex-column">
                        <p class="my-3">TARTA DE OREO</p>
                        <span><span>4</span>,00 € IVA incluido</span>
                        <a href="http://bernatdaw2.com/Proyecto_1/Cafemat/?controller=producto&action=carta#postre" class="align-self-end">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="" class="icono_compra">
                            </button>
                        </a>
                    </section>
                </section>
                
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

</body>
</html>