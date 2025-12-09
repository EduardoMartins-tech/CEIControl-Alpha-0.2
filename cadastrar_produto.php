<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$data = date('Y-m-d');

$sql = "INSERT INTO produtos_servicos (tipo, nome, descricao, preco, data_cadastro)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssds", $tipo, $nome, $descricao, $preco, $data);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!<br>";
    echo '<a href="form_cadastro_produto.php">Cadastrar outro</a><br>';
    echo '<a href="painel_admin.php">Voltar ao painel</a>';
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}
$conn->close();
?>