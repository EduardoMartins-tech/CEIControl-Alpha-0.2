<?php
session_start();
include 'database.php';

// Segurança básica
if (!isset($_SESSION['usuario_id'])) { exit("Acesso negado"); }

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_cadastro = date('Y-m-d');

// SQL compatível com a sua tabela 'fornecedores'
$sql = "INSERT INTO fornecedores (nome, cnpj, email, telefone, data_cadastro) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $cnpj, $email, $telefone, $data_cadastro);

if ($stmt->execute()) {
    header("Location: listar_fornecedores.php?msg=sucesso");
} else {
    echo "Erro ao cadastrar fornecedor: " . $conn->error;
}
?>