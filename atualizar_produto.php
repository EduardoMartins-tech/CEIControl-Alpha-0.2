<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = ($tipo === 'produto') ? $_POST['quantidade'] : 0;

$sql = "UPDATE produtos_servicos 
        SET tipo = ?, nome = ?, descricao = ?, preco = ?, quantidade = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssddi", $tipo, $nome, $descricao, $preco, $quantidade, $id);

if ($stmt->execute()) {
    header("Location: listar_produtos.php");
    exit;
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>