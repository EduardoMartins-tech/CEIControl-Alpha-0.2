<?php
session_start();
include 'database.php';

if (!isset($_SESSION['usuario_id'])) { exit("Acesso negado"); }

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao']; // Nome exato da sua coluna
$data_evento = $_POST['data_evento'];
$hora_evento = $_POST['hora_evento'];
$local = $_POST['local'];
$publico_alvo = $_POST['publico_alvo'];
$criado_por = $_SESSION['usuario_id'];
$data_cadastro = date('Y-m-d'); // Preenche sua coluna data_cadastro

$sql = "INSERT INTO agenda (titulo, descricao, data_evento, hora_evento, local, criado_por, publico_alvo, data_cadastro) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssiss", $titulo, $descricao, $data_evento, $hora_evento, $local, $criado_por, $publico_alvo, $data_cadastro);

if ($stmt->execute()) {
    header("Location: listar_eventos.php?msg=sucesso");
} else {
    echo "Erro: " . $conn->error;
}
?>