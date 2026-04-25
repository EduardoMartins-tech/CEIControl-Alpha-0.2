<?php
session_start();
include 'database.php';
$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "UPDATE servicos SET nome=?, descricao=?, preco=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $nome, $descricao, $preco, $id);
$stmt->execute();
header("Location: listar_estoque.php?msg=editado");
?>