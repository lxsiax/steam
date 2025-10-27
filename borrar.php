<?php 

//$id = trim($_POST['id']); 
require 'auxiliar.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
$_csrf = obtener_post('_csrf');

if (isset($id,$_csrf)){
    if (!comprobar_csrf($_csrf)){
                return volver_index();
        }
    $pdo = conectar();
    $sent = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $sent->execute([':id' => $id]); 
}

volver_index();
