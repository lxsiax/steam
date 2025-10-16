<?php 

//$id = trim($_POST['id']); 

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

$pdo = new PDO('pgsql:host=localhost;dbname=steam', 'steam', 'steam');
$sent = $pdo->prepare("DELETE FROM cliente WHERE id = :id");
$sent->execute([':id' => $id]); 

header('Location: index.php');
exit;
