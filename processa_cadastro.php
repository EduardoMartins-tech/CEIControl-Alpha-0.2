<?php
session_start();
// Proteção: Apenas admin pode processar novos cadastros
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

// 1. Conexão com o banco
include 'database.php';

// 2. Recebendo os dados do formulário via POST
$nome   = $_POST['nome'];
$email  = $_POST['email'];
$senha  = $_POST['senha'];
$perfil = $_POST['perfil'];

// 3. Verificação básica (campos vazios)
if (empty($nome) || empty($email) || empty($senha) || empty($perfil)) {
    header("Location: form_cadastro_usuario.php?erro=campos_vazios");
    exit;
}

// 4. CRIPTOGRAFIA DA SENHA (Segurança ADS)
// Usamos password_hash para que, se o banco vazar, ninguém descubra a senha real
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// 5. Preparando a SQL (usando Prepared Statements para evitar SQL Injection)
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $perfil);

// ... (parte de cima do código continua igual até o execute)

if ($stmt->execute()) {
    header("Location: listar_usuarios.php?msg=cadastrado");
} else {
    // Verifica se o erro é de entrada duplicada (Código 1062 no MySQL)
    if ($conn->errno == 1062) {
        header("Location: form_cadastro_usuario.php?erro=email_duplicado");
    } else {
        header("Location: form_cadastro_usuario.php?erro=sistema");
    }
}
exit;

// 6. Executando e verificando o resultado
if ($stmt->execute()) {
    // Cadastro sucesso: Redireciona para a lista com mensagem
    header("Location: listar_usuarios.php?msg=cadastrado");
} else {
    // Se der erro (ex: e-mail duplicado)
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>