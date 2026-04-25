<?php
session_start();
include 'database.php';

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    exit("Acesso negado");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Impede que o admin logado se exclua
    if (isset($_SESSION['usuario_id']) && $id == $_SESSION['usuario_id']) {
        header("Location: listar_usuarios.php?erro=auto_exclusao");
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar_usuarios.php?msg=excluido");
    } else {
        header("Location: listar_usuarios.php?erro=falha_exclusao");
    }
} else {
    header("Location: listar_usuarios.php");
}
?>