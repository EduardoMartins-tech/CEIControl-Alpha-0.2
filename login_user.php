<?php
session_start();
include('database.php');

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];
$perfil = $_POST['perfil'];

// Busca o usuário pelo e-mail e pelo perfil selecionado
$sql = "SELECT * FROM usuarios WHERE email = ? AND perfil = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $perfil);
$stmt->execute();
$result = $stmt->get_result();

// Se encontrar exatamente 1 usuário
if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    // Compara a senha digitada com a senha do banco (TEXTO PURO)
    if ($senha === $usuario['senha']) {
        // Cria as sessões para identificar o usuário nas outras páginas
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['perfil'] = $usuario['perfil'];

        // Redirecionamento baseado no perfil
        switch ($usuario['perfil']) {
            case 'admin':
                header("Location: painel_admin.php");
                break;
            case 'cliente':
                header("Location: painel_cliente.php");
                break;
            case 'usuario':
                header("Location: painel_usuario.php");
                break;
            default:
                header("Location: form_login.php?erro=1");
                break;
        }
        exit;
    }
}

// Se chegar aqui, é porque o e-mail, perfil ou senha estão errados
header("Location: form_login.php?erro=1");
exit;
?>