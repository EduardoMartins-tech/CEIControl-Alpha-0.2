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

// Se for produto, usa o valor informado. Se for serviço, define como 0.
$quantidade = ($tipo === 'produto') ? $_POST['quantidade'] : 0;

$sql = "INSERT INTO produtos_servicos (tipo, nome, descricao, preco, data_cadastro, quantidade)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdsd", $tipo, $nome, $descricao, $preco, $data, $quantidade);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!<br>";
    echo '<a href="form_cadastro_produto.php">Cadastrar outro</a><br>';
    echo '<a href="painel_admin.php">Voltar ao painel</a>';
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}
$conn->close();
?>