<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    img{
        height:50px;
        width:auto;
    }
</style>

<body>
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IMG</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once 'config/dataBase.php';    

            $conn = dataBase::connect();
    
            $sql = "SELECT * FROM producto";
            $result = $conn->query($sql);
    
            while ($row = $result->fetch_assoc()) {?>
    
                 <tr>
                    <td><?php echo $row["producto_id"]; ?></td>
                    <td><img src="<?php echo $row["img"]; ?>" alt=""></td>
                    <td><?php echo  $row["nombre"]; ?></td>
                    <td><?php echo  $row["precio"]; ?></td>
                    <td><?php echo  $row["categoria"]; ?></td>
                    <td><?php echo  $row["descripcion"]; ?></td>
                    <td><form action="<?php   ?>" method="post">
                        <button>Editar</button>
                    </form></td>
                    <td><form action="<?php   ?>" method="post">
                        <button>Eliminar</button>
                    </form></td>
                </tr> 
                    
            <?php } ?>
                
                
    </tbody>
    </table>
</body>
</html>