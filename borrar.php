<?php 

//$id = trim($_POST['id']); 
require 'auxiliar.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

if ($id){
    $pdo = conectar();
    $sent = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $sent->execute([':id' => $id]); 
}

volver_index();
