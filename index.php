<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <?php
    $pdo = new PDO('pgsql:host=localhost;dbname=steam', 'steam', 'steam');
    $pdo->exec("SET NAMES 'UTF8'");
    $sent = $pdo->query('SELECT * FROM clientes');
    ?>

    <table border="1">
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Teléfono</th>
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
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <?php 
    $juegos = $pdo->query('SELECT * FROM juegos');
    ?>

    <table border="1">
        <thead>
            <th>Nombre</th>
            <th>Género</th>
            <th>Fecha de publicación</th>
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