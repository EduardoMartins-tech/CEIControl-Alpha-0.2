<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data = date('Y-m-d'); // Gera a data do dia automaticamente

$sql = "INSERT INTO fornecedores (nome, cnpj, email, telefone, data_cadastro)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar statement: " . $conn->error);
}

$stmt->bind_param("sssss", $nome, $cnpj, $email, $telefone, $data);

if ($stmt->execute()) {
    echo "Fornecedor cadastrado com sucesso!<br>";
    echo '<a href="form_cadastro_fornecedor.php">Cadastrar outro</a><br>';
    echo '<a href="painel_admin.php">Voltar ao painel</a>';
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$conn->close();
?>