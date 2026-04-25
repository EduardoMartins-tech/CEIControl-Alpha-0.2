<?php
session_start();
include 'database.php';

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    exit("Acesso negado");
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha']; // Senha sem criptografia

if (!empty($senha)) {
    // Atualiza tudo, incluindo a nova senha em texto simples
    $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, perfil=?, senha=? WHERE id=?");
    $stmt->bind_param("ssssi", $nome, $email, $perfil, $senha, $id);
} else {
    // Atualiza apenas os dados, mantendo a senha atual
    $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, perfil=? WHERE id=?");
    $stmt->bind_param("sssi", $nome, $email, $perfil, $id);
}

if ($stmt->execute()) {
    header("Location: listar_usuarios.php?msg=editado");
} else {
    header("Location: listar_usuarios.php?erro=falha_update");
}
?>