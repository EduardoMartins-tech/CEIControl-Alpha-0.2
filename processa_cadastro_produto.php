<?php
session_start();
include 'database.php';

if (!isset($_SESSION['usuario_id'])) { exit("Acesso negado"); }

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$data_cadastro = date('Y-m-d');

$sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, data_cadastro) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdis", $nome, $descricao, $preco, $quantidade, $data_cadastro);

if ($stmt->execute()) {
    header("Location: listar_estoque.php?msg=sucesso");
} else {
    echo "Erro: " . $conn->error;
}
?>