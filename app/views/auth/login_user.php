<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /login");
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (!$email || !$senha) {
    header("Location: /login?erro=1");
    exit;
}

$controller = new AuthController($conn);
$controller->login($email, $senha);
?>
