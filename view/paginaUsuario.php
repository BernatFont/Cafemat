<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCuenta.css">
    <title>Pagina del usuario | Cafemat</title>
</head>
<body>
    <main class="container-fluid px-4 mt-3">
        <section class="row titulo">
            <h2>CUENTA</h2>
        </section>
        <section class="row my-4">
            <section class="col-12 col-lg-4 d-flex align-items-center flex-column p-3 datos">
                <img src="icon/acount.png" alt="" class="acount_logo mb-3">
                <form action="" method='post' class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?= $usuario->nombre ?>" class="form-control mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" value="<?= $usuario->apellido ?>" class="form-control mb-3">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" value="<?= $usuario->correo ?>" class="form-control mb-3">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" value="<?= $usuario->nombre_usuario ?>" class="form-control mb-3">
                </form>
                <section class="d-flex flex-column">
                    <?php if($usuario->nombre == user_admin){?>
                        <a href="<?= url."?controller=producto&action=panelControlAdmin"?>" class="btn btn-warning">Panel control</a>
                    <?php } ?>
                    <form action="<?= url."?controller=usuario&action=cerrarCuenta"?>" method="post">
                        <button class="btn btn-danger my-2">Cerrar cuenta</button>
                    </form>
                </section>
            </section>
            <section class="col-12 col-lg-8">
                
                <?php
                    if(empty($pedidos_usuario)){?>
                        <section class="d-flex flex-column align-items-center my-3">
                            <h2>No has realizado ningún pedido.</h2>
                            <p>Si quieres realizar uno, por favor haz clic <a href="<?= url."?controller=producto&action=carta"?>" class="aqui">aqui</a>.</p>
                        </section>
                    <?php
                    }elseif(!empty($pedidos_usuario)){?>
                        <section class="titulo mb-3">
                            <h2>Pedidos realizados</h2>
                        </section>
                        <table class="table table-striped">
                            <tr>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Bultos</th>
                                <th>Coste</th>
                                <th>Estado</th>
                            </tr>
                            <?php 
                                foreach($pedidos_usuario as $pedido){?>
                                    <tr>
                                        <td><?= $usuario->nombre_usuario ?></td>
                                        <td><?= $pedido->fecha ?></td>
                                        <td><?= $pedido->hora ?></td>
                                        <td><?= $pedido->cantidad_bultos ?></td>
                                        <td><?= number_format($pedido->coste,2).'€' ?></td>
                                        <td><?= $pedido->estado ?></td>
                                    </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>

            </section>
        </section>
        
    </main>
</body>
</html>