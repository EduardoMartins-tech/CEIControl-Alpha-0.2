<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_evento = $_POST['data_evento'];
$publico_alvo = $_POST['publico_alvo'];
$data_cadastro = date('Y-m-d');

$sql = "INSERT INTO agenda (titulo, descricao, data_evento, publico_alvo, data_cadastro)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar SQL: " . $conn->error);
}

$stmt->bind_param("sssss", $titulo, $descricao, $data_evento, $publico_alvo, $data_cadastro);

if ($stmt->execute()) {
    echo "Evento cadastrado com sucesso!<br>";
    echo '<a href="form_cadastro_evento.php">Cadastrar outro</a><br>';
    echo '<a href="painel_admin.php">Voltar ao painel</a>';
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$conn->close();
?>