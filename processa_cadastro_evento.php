<?php
session_start();
include 'database.php';

if (!isset($_SESSION['usuario_id'])) { exit("Acesso negado"); }

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_evento = $_POST['data_evento'];
$publico_alvo = $_POST['publico_alvo'];
$data_cadastro = date('Y-m-d');

// SQL ajustado para bater com a tabela 'agenda' que criamos
$sql = "INSERT INTO agenda (titulo, descricao, data_evento, publico_alvo, data_cadastro) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro no banco: " . $conn->error);
}

// "sssss" = 5 strings (titulo, descricao, data_evento, publico_alvo, data_cadastro)
$stmt->bind_param("sssss", $titulo, $descricao, $data_evento, $publico_alvo, $data_cadastro);

if ($stmt->execute()) {
    header("Location: listar_eventos.php?msg=sucesso");
} else {
    echo "Erro ao salvar: " . $stmt->error;
}
?>