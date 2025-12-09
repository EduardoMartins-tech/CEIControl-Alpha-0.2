<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['perfil'] !== 'admin' && $_SESSION['perfil'] !== 'cliente')) {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$remetente_id = $_SESSION['id'];
$destinatario_id = $_POST['destinatario_id'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens (remetente_id, destinatario_id, mensagem) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $remetente_id, $destinatario_id, $mensagem);

if ($stmt->execute()) {
    header("Location: mensagens.php?para=$destinatario_id");
    exit;
} else {
    echo "Erro ao enviar mensagem: " . $stmt->error;
}
?>