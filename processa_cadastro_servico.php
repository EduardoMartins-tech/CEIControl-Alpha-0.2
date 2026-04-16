<?php
session_start();
include 'database.php';
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$data = date('Y-m-d');

$sql = "INSERT INTO servicos (nome, descricao, preco, data_cadastro) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $nome, $descricao, $preco, $data);
$stmt->execute();
header("Location: listar_estoque.php?msg=sucesso");
?>