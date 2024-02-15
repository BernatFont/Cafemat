<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
                <img src="icon/acount.png" alt="icono de usuario" class="acount_logo mb-3">
                <form action="<?= url."?controller=usuario&action=inicioSesion"?>" method='post' class="form-group">
                    <?php if(isset($usuario_modificado)){ ?>
                            <div class="alert alert-success"><?= $usuario_modificado ?></div>
                    <?php } ?>
                    <input type="hidden" value="<?= $usuario->getUsuario_id() ?>" name="id">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?= $usuario->getNombre() ?>" class="form-control mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" value="<?= $usuario->getApellido() ?>" class="form-control mb-3">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" value="<?= $usuario->getCorreo() ?>" class="form-control mb-3">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" value="<?= $usuario->getNombre_usuario() ?>" class="form-control mb-3">
                    <label for="Contraseña">Contraseña</label>
                    <input type="text" name="contra" value="<?= $usuario->getContraseña() ?>" class="form-control mb-3">
                    <label for="Puntos">Puntos</label>
                    <input type="text" name="puntos" value="<?= $usuario->getPuntos() ?>" readonly="readonly" class="form-control mb-3">
                    <label for="nivelAcceso">Nive de permisos</label>
                    <?php if($usuario->getNombre_usuario() == user_admin){?>
                        <input type="text" name="nivelAcceso" value="<?= $usuario->getNivelAcceso() ?>" readonly="readonly" class="form-control mb-3">
                    <?php }else{ ?>
                        <input type="text" name="nivelAcceso" value="60"  readonly="readonly" class="form-control mb-3">
                    <?php } ?>
                    <button class="mt-3 py-2 bt" name='modificar_usuario'>Modificar usuario</button>
                </form>
                <div class="d-flex flex-column">
                    <?php if($usuario->getNombre_usuario() == user_admin){?>
                        <a href="<?= url."?controller=producto&action=panelControlAdmin"?>" class="bt mt-3 py-2">Panel control</a>
                    <?php } ?>
                    <form action="<?= url."?controller=usuario&action=cerrarCuenta"?>" method="post">
                        <button class="bt bt_cerrar py-2 my-3">Cerrar cuenta</button>
                    </form>
                </div>
            </section>
            <section class="col-12 col-lg-8">
                
                <?php
                    if(empty($pedidos_usuario)){?>
                        <div class="d-flex flex-column align-items-center my-3">
                            <h2>No has realizado ningún pedido.</h2>
                            <p>Si quieres realizar uno, por favor haz clic <a href="<?= url."?controller=producto&action=carta"?>" class="aqui">aqui</a>.</p>
                        </div>
                    <?php
                    }elseif(!empty($pedidos_usuario)){?>
                        <div class="titulo mb-3">
                            <h2>Pedidos realizados</h2>
                        </div>
                        <div style="max-height: 60vh; overflow:auto">
                            <table class="table table-striped">
                                <tr>
                                    <th>Fecha</th>
                                    <th class="del">Hora</th>
                                    <th>Bultos</th>
                                    <th>Coste</th>
                                    <th class="del">Estado</th>
                                    <th></th>
                                </tr>
                                <?php 
                                    foreach($pedidos_usuario as $pedido){?>
                                        <tr>
                                            <td><?= $pedido->fecha_inicio ?></td>
                                            <td class="del"><?= $pedido->hora ?></td>
                                            <td><?= $pedido->cantidad_bultos ?></td>
                                            <td><?= number_format($pedido->coste,2).'€' ?></td>
                                            <td class="del"><?= $pedido->estado ?></td>
                                            <td>
                                                <form action="<?= url."?controller=pedido&action=verProductosPedido"?>" method="post">
                                                    <input type="hidden" value="<?= $pedido->pedido_id ?>" name="pedido_id">
                                                    <button name="ver_productos" class="bt">Detalles</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <?php }
                    ?>
            </section>
        </section>
        
    </main>
</body>
</html>