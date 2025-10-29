<?php
session_start();

require 'auxiliar.php';

if (!esta_logueado()) {
    return;
}

if ($_SESSION['nick'] != 'admin') {
    $_SESSION['fallo'] = 'No tienes permiso para borrar un cliente';
    return volver_index();
}

// $id = trim($_POST['id']);
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
$_csrf = obtener_post('_csrf');

if (isset($id, $_csrf)) {
    if (!comprobar_csrf($_csrf)) {
        return volver_index();
    }
    $pdo = conectar();
    $sent = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $sent->execute([':id' => $id]);
    $_SESSION['exito'] = 'El cliente se ha borrado correctamente';

}

header('Location: index.php');