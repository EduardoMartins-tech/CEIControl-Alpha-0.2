<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome   = trim($_POST['nome']   ?? '');
    $email  = trim($_POST['email']  ?? '');
    $senha  = trim($_POST['senha']  ?? '');
    $perfil = trim($_POST['perfil'] ?? '');

    if (!$nome || !$email || !$senha || !$perfil) {
        header("Location: " . BASE_URL . "usuarios/cadastro?erro=campos_vazios");
        exit;
    }

    $controller = new UsuarioController($conn);
    $controller->cadastrar($nome, $email, $senha, $perfil);
} else {
    header("Location: " . BASE_URL . "usuarios/cadastro");
    exit;
}
?>
