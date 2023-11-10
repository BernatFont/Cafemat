<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleCarta.css">
    <title>Carta</title>
</head>
<body>
    <header>

    </header>

    <main class="container-fluid px-4">
        <section id="titulo">
            <h2 class="TTBold_32">CARTA</h2>
        </section>

        <section class="mt-5" id="almuerzo">
            <section>
                <section class="row no_margin">
                    <img src="img/almuerzo_top.png" alt="Un café con un croisant" class="col-6 col-md-6 col-lg-3">
                    <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50">Almuerzo</p></div>
                </section>
                <section>
                    <p class="TTBold_32 mt-2">ALMUERZO<br>(<?=$numAlmuerzos?>)</p>
                    <div class="descripcion_seccion">
                        <p class="TTRegular_14">Almuerza en Obramat, elije entrelos mejores productos. La mejor calidad al mejor precio.</p>
                    </div>
                </section>
            </section>
            <section class="seccion_productos d-flex justify-content-center flex-wrap mt-5">
            <?php
        
                foreach ($productosAlmuerzo as $producto) {?>

                    <section class="producto d-flex justify-content-between p-2 m-4">
                        <section>
                            <img src="<?= $producto->img; ?>" alt="imagen del producto" class="imagen_producto">
                        </section>
                        <section class="d-flex flex-column align-items-end">
                            <p class="nombre_producto"><?= strtoupper($producto->nombre); ?></p>

                            <?php $precio = $producto->precio;
                                $array_precio = explode(".", $precio);
                            ?>

                            <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                            
                            <p>
                                <?php
                                    $precio_sin_IVA = $precio - (($precio * 10)/100);
                                    $array_sin_IVA = explode(".", $precio_sin_IVA);
                                ?>
                                <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                            </p>
                        </section>
                        <form action="" class="bt_pedido">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                            </button>
                        </form>
                    </section>
            <?php } ?>
            </section>
        </section>

        
        <section class="mt-5" id="para_comer">
            <section>
                <section class="row no_margin">
                    <img src="img/para_comer_top.png" alt="butifarra con alubias" class="col-6 col-md-6 col-lg-3">
                    <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50">Para comer</p></div>
                </section>
                <section>
                    <p class="TTBold_32 mt-2">PARA COMER<br>(<?=$numPara_comer?>)</p>
                    <div class="descripcion_seccion">
                        <p class="TTRegular_14">Descubre nuestra amplia gama de productos para tus mejores comidas.</p>
                    </div>
                </section>
            </section>
            <section class="seccion_productos d-flex justify-content-center flex-wrap mt-5">
            <?php
        
                foreach ($productosPara_comer as $producto) {?>

                    <section class="producto d-flex justify-content-between p-2 m-4">
                        <section>
                            <img src="<?= $producto->img; ?>" alt="imagen del producto" class="imagen_producto">
                        </section>
                        <section class="d-flex flex-column align-items-end">
                            <p class="nombre_producto"><?= strtoupper($producto->nombre); ?></p>

                            <?php $precio = $producto->precio;
                                $array_precio = explode(".", $precio);
                            ?>

                            <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                            
                            <p>
                                <?php
                                    $precio_sin_IVA = $precio - (($precio * 10)/100);
                                    $array_sin_IVA = explode(".", $precio_sin_IVA);
                                ?>
                                <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                            </p>
                        </section>
                        <form action="" class="bt_pedido">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                            </button>
                        </form>
                    </section>
            <?php } ?>
            </section>
        </section>


        <section class="mt-5" id="bebida">
            <section>
                <section class="row no_margin">
                    <img src="img/bebida_top.png" alt="refrescos" class="col-6 col-md-6 col-lg-3">
                    <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50">Bebida</p></div>
                </section>
                <section>
                    <p class="TTBold_32 mt-2">BEBIDA<br>(<?=$numBebida?>)</p>
                    <div class="descripcion_seccion">
                        <p class="TTRegular_14">Cafemat pone a tu disposición las bebidas de mejor calidad.</p>
                    </div>
                </section>
            </section>
            <section class="seccion_productos d-flex justify-content-center flex-wrap mt-5">
            <?php
        
                foreach ($productosBebida as $producto) {?>

                    <section class="producto d-flex justify-content-between p-2 m-4">
                        <section>
                            <img src="<?= $producto->img; ?>" alt="imagen del producto" class="imagen_producto">
                        </section>
                        <section class="d-flex flex-column align-items-end">
                            <p class="nombre_producto"><?= strtoupper($producto->nombre); ?></p>

                            <?php $precio = $producto->precio;
                                $array_precio = explode(".", $precio);
                            ?>

                            <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                            
                            <p>
                                <?php
                                    $precio_sin_IVA = $precio - (($precio * 10)/100);
                                    $array_sin_IVA = explode(".", $precio_sin_IVA);
                                ?>
                                <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                            </p>
                        </section>
                        <form action="" class="bt_pedido">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                            </button>
                        </form>
                    </section>
            <?php } ?>
            </section>
        </section>


        <section class="mt-5" id="postre">
            <section>
                <section class="row no_margin">
                    <img src="img/postre_top.png" alt="crema catalana y en segundo palano, 2 neulas, 2 limones y tarro de azucar" class="col-6 col-md-6 col-lg-3">
                    <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50">Postre</p></div>
                </section>
                <section>
                    <p class="TTBold_32 mt-2">POSTRE<br>(<?=$numPostre?>)</p>
                    <div class="descripcion_seccion">
                        <p class="TTRegular_14">Todos los mejores postres de la mejor calidad.</p>
                    </div>
                </section>
            </section>
            <section class="seccion_productos d-flex justify-content-center flex-wrap mt-5">
            <?php
        
                foreach ($productosPostre as $producto) {?>

                    <section class="producto d-flex justify-content-between p-2 m-4">
                        <section>
                            <img src="<?= $producto->img; ?>" alt="imagen del producto" class="imagen_producto">
                        </section>
                        <section class="d-flex flex-column align-items-end">
                            <p class="nombre_producto"><?= strtoupper($producto->nombre); ?></p>

                            <?php $precio = $producto->precio;
                                $array_precio = explode(".", $precio);
                            ?>

                            <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                            
                            <p>
                                <?php
                                    $precio_sin_IVA = $precio - (($precio * 10)/100);
                                    $array_sin_IVA = explode(".", $precio_sin_IVA);
                                ?>
                                <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                            </p>
                        </section>
                        <form action="" class="bt_pedido">
                            <button class="bt_compra">
                                <span>+</span>
                                <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                            </button>
                        </form>
                    </section>
            <?php } ?>
            </section>
        </section>

    </main>

    <footer>
        
    </footer>

</body>
</html>