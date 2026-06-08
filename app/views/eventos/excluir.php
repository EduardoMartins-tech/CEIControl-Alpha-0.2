<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/EventoController.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $controller = new EventoController($conn);
    $controller->excluir($id);
} else {
    header("Location: " . BASE_URL . "eventos");
    exit;
}
?>