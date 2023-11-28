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
    <main class="container-fluid px-4 mt-3">
        <section id="titulo">
            <h2 class="TTBold_32">CARTA</h2>
        </section>
        <?php 
        $i = 0;
            foreach($categorias as $categoria){?>

            <section class="mt-5" id="<?= $contenido_categoria[$i]->nombre ?>">
                <section>
                    <section class="row px-3">
                        <img src="<?=$contenido_categoria[$i]->img?>" alt="imagen de la seccion" class="col-6 col-md-6 col-lg-3 p-0">
                        <div class="titulo_seccion col-6 col-md-6 col-lg-9"><p class="ObjetBold_50"><?=$contenido_categoria[$i]->nombre?></p></div>
                    </section>
                    <section>
                        <p class="TTBold_32 mt-2"><?= strtoupper($contenido_categoria[$i]->nombre)?><br>(<?=$num_productos[$i]?>)</p>
                        <div class="descripcion_seccion">
                            <p class="TTRegular_14"><?=$contenido_categoria[$i]->frase?></p>
                        </div>
                    </section>
                </section>
                <section class="seccion_productos d-flex justify-content-center flex-wrap mt-5">
                <?php foreach($categoria as $producto){ ?>
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
                    <form action="<?= url."?controller=producto&action=agregarAlPedido" ?>" class="bt_pedido" method="post">
                        <input type="hidden" name=producto_id value="<?= $producto->producto_id; ?>">
                        <input type="hidden" name=usuario value="<?= $usuario; ?>">
                        <button class="bt_compra">
                            <span>+</span>
                            <img src="icon/paper-bag-white.png" alt="icono de una bolsa de pedidos" class="icono_compra">
                        </button>
                    </form>
                </section>
            <?php }
            $i++;
            }
        ?>

    </main>

    <footer>
        
    </footer>

</body>
</html>