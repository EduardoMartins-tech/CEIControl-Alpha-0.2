<?php
session_start();
include 'database.php';

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    exit("Acesso negado");
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha']; // Senha sem criptografia

// Verifica se o e-mail já existe para evitar erro 1062
$check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
if ($check->get_result()->num_rows > 0) {
    header("Location: form_cadastro_usuario.php?erro=email_duplicado");
    exit;
}

$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, perfil, senha) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $perfil, $senha);

if ($stmt->execute()) {
    header("Location: listar_usuarios.php?msg=cadastrado");
} else {
    header("Location: form_cadastro_usuario.php?erro=sistema");
}
?>