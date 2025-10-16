<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <?php
    require 'auxiliar.php';
    $pdo = conectar();
    $pdo->exec("SET NAMES 'UTF8'");
    $sent = $pdo->query('SELECT * FROM cliente');
    ?>

    <table border="1">
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila): ?>
            <tr>
                <td><?= $fila['dni'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['apellidos'] ?></td>
                <td><?= $fila['direccion'] ?></td>
                <td><?= $fila['codpostal'] ?></td>
                <td><?= $fila['telefono'] ?></td>
                <td>
                    <form action="borrar.php" method="post">
                        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                        <button type="submit">Borrar</button>
                    </form>    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <?php 
    $juegos = $pdo->query('SELECT * FROM juego');
    ?>

    <table border="1" >
        <thead>
            <th>Nombre</th>
            <th>Género</th>
            <th>Fecha y hora publicación</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php foreach ($juegos as $filajuego): ?>
            <tr>
                <td><?= $filajuego['nombre']?></td>
                <td><?= $filajuego['genero']?></td>
                <td><?= $filajuego['fpublicacion']?></td>
                <td><?= $filajuego['precio']?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>