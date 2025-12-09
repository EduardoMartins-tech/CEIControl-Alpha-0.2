<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "UPDATE fornecedores 
        SET nome = ?, cnpj = ?, email = ?, telefone = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nome, $cnpj, $email, $telefone, $id);

if ($stmt->execute()) {
    header("Location: listar_fornecedores.php");
    exit;
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>