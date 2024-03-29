<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCarta.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="library/sweetalert/sweetalert2.min.css">
    <title>Carta | Cafemat</title>
</head>
<body>
    <main class="mt-3 container-fluid px-md-5">
        <section id="titulo" class="d-flex justify-content-between">
            <h2 class="TTBold_32">CARTA</h2>
            <button id="categoryFilter" class="bt bt_filter align-self-center"><img src="icon/filter-blue.png" alt="icono de un filtro"></button>
        </section>
        <?php 
        $i = 0;
            foreach($categorias as $categoria){?>

                <div class="mt-5" id="<?= $contenido_categoria[$i]->getNombre() ?>">
                    <div>
                        <div class="row">
                            <img src="<?=$contenido_categoria[$i]->getImg()?>" alt="imagen de la seccion: <?= $contenido_categoria[$i]->getNombre() ?>" class="col-6 col-md-6 col-lg-3 p-0">
                            <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50"><?=$contenido_categoria[$i]->getNombre() ?></p></div>
                        </div>
                        <div>
                            <p class="TTBold_32 mt-2"><?= strtoupper($contenido_categoria[$i]->getNombre())?><br>(<?=$num_productos[$i]?>)</p>
                            <div class="descripcion_seccion">
                                <p class="TTRegular_14"><?=$contenido_categoria[$i]->getFrase() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="seccion_productos d-flex justify-content-center flex-wrap mt-5">

                    <?php foreach($categoria as $producto){ ?>
                        <div class="producto d-flex justify-content-between pe-2 pt-1 m-4">
                            <div>
                                <img src="<?= $producto->getImg(); ?>" alt="imagen del producto: <?= $producto->getNombre() ?>" class="imagen_producto">
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <p class="nombre_producto"><?= strtoupper($producto->getNombre()); ?></p>

                                <?php $precio = $producto->getPrecio();
                                    $array_precio = explode(".", $precio);
                                ?>

                                <span class="entero"><?= $array_precio[0]; ?><span class="decimal">.<?= $array_precio[1]; ?> € IVA incluido</span></span>
                                
                                <p class="sin_iva">
                                    <?php
                                        $precio_sin_IVA = number_format($precio - (($precio * 10)/100),2);
                                        $array_sin_IVA = explode(".", $precio_sin_IVA);
                                    ?>
                                    <span class="entero_sinIVA"><?= $array_sin_IVA[0]; ?><span class="decimal_sinIVA">.<?= $array_sin_IVA[1]; ?> € sin IVA</span></span>
                                </p>
                            </div>
                            <form action="<?= url."?controller=producto&action=agregarAlPedido" ?>" class="bt_pedido" method="post">
                                <input type="hidden" name=producto_id value="<?= $producto->getProducto_id(); ?>">
                                <input type="hidden" name=usuario value="<?= $usuario; ?>">
                                <button class="bt bt_compra">
                                    <span>+</span>
                                    <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                                </button>
                            </form>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
    </main>
    <script src="library/sweetalert/sweetalert2.min.js"></script>
    <script src="library/sweetalert/cleave.min.js"></script>
    <script src="library/sweetalert/addons/cleave-phone.i18n.js"></script>
    <script src="js/scriptCarta.js"></script>
</body>
</html>