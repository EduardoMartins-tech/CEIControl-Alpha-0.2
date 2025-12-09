<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_evento = $_POST['data_evento'];
$publico_alvo = $_POST['publico_alvo'];

$sql = "UPDATE agenda 
        SET titulo = ?, descricao = ?, data_evento = ?, publico_alvo = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $titulo, $descricao, $data_evento, $publico_alvo, $id);

if ($stmt->execute()) {
    header("Location: listar_eventos.php");
    exit;
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>