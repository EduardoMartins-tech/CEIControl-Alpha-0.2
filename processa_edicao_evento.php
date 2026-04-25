<?php
session_start();
include('database.php');

// Proteção básica de sessão
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_original = $_POST['titulo_original'];
    $novo_titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_evento = $_POST['data_evento'];
    $hora_evento = $_POST['hora_evento'];
    $local = $_POST['local'];
    $publico_alvo = $_POST['publico_alvo'];

    // Atualiza os dados usando o título original como referência (já que não temos ID fixo)
    $sql = "UPDATE agenda SET titulo = ?, descricao = ?, data_evento = ?, hora_evento = ?, local = ?, publico_alvo = ? WHERE titulo = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $novo_titulo, $descricao, $data_evento, $hora_evento, $local, $publico_alvo, $titulo_original);

    if ($stmt->execute()) {
        header("Location: listar_eventos.php?msg=editado");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>