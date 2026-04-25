<?php
session_start();
include('database.php');

$email  = $_POST['email'];
$senha  = $_POST['senha'];
$perfil = $_POST['perfil'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND perfil = ?");
$stmt->execute([$email, $perfil]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $senha === $usuario['senha']) {
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nome']       = $usuario['nome'];
    $_SESSION['perfil']     = $usuario['perfil'];

    switch ($usuario['perfil']) {
        case 'admin':   header("Location: painel_admin.php"); break;
        case 'cliente': header("Location: painel_cliente.php"); break;
        case 'usuario': header("Location: painel_usuario.php"); break;
        default:        header("Location: form_login.php?erro=1"); break;
    }
    exit;
}

header("Location: form_login.php?erro=1");
exit;
?>
