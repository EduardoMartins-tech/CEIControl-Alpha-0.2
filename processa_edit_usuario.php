<?php
session_start();
include('database.php');

// Verifica admin
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') { exit; }

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha'];

if (!empty($senha)) {
    // Se digitou senha, criptografa
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET nome=?, email=?, perfil=?, senha=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $email, $perfil, $senhaHash, $id);
} else {
    // Sem senha nova, atualiza só o resto
    $sql = "UPDATE usuarios SET nome=?, email=?, perfil=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $perfil, $id);
}

if ($stmt->execute()) {
    header("Location: listar_usuarios.php?msg=editado");
} else {
    header("Location: listar_usuarios.php?erro=falha_update");
}
?>