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
            <section class="banner1 d-flex col-8">
                <p class="slogan m-3">Sabores que construyen momentos inolvidables</p>
                <form action="<?= url."?controller=producto&action=pedido"?>" class="align-self-end">
                    <button class="bt_frase_preparar">
                        <p class="frase_preparar"><img src="icon/right-arrow.png" alt="" class="right_row"> Prepara tu pedido</p>
                    </button>
                </form>
            </section>
            <section class="banner2 col-4"></section>
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
            <section class="container-fluid d-flex justify-content-evenly categorias">
                <section class="cat1">
                    <section>
                        <form action="">
                            <button class="bt_sec_2">ALMUERZO</button>
                        </form>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/almuerzo.jpg" alt="">
                    </section>
                </section>
                <section class="cat2">
                    <section>
                        <form action="">
                            <button class="bt_sec_2">PARA COMER</button>
                        </form>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/combi1.jpg" alt="">
                    </section>
                </section>
                <section class="cat1">
                    <section>
                        <form action="">
                            <button class="bt_sec_2">BEBIDA</button>
                        </form>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/bebida.webp" alt="">
                    </section>
                </section>
                <section class="cat2">
                    <section>
                        <form action="">
                            <button class="bt_sec_2">POSTRE</button>
                        </form>
                    </section>
                    <section class="img_sec_2">
                        <img src="img/postre.jpg" alt="">
                    </section>
                </section>
            </section>
        </section>
        <h1>hola</h1>
        <h1>hola</h1>
        <h1>hola</h1>
    </main>

</body>
</html>