<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/UsuarioController.php';

$controller = new UsuarioController($conn);
$usuario = isset($_GET['id']) ? $controller->buscar((int)$_GET['id']) : null;
$pagina_atual = 'usuarios';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário - CEIControl</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include __DIR__ . '/../../../sidebar.php'; ?>
    <main class="main-content">
        <header class="dash-header">
    <div class="header-welcome">
        <h1>Editar Usuário</h1>
        <p>Modificando: <strong><?= htmlspecialchars($usuario['nome'] ?? 'Usuário') ?></strong></p>
    </div>
    <a href="<?= BASE_URL ?>usuarios" class="btn-black-full" style="width:auto;padding:10px 25px;background:#666;">
        <i class="fa-solid fa-arrow-left"></i> Voltar
    </a>
</header>

        <section class="content-wrapper">
            <div class="admin-card">
                <form action="<?= BASE_URL ?>usuarios/atualizar" method="POST" class="custom-form">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>E-mail de Acesso</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Perfil de Acesso</label>
                        <select name="perfil" required>
                            <option value="admin" <?= $usuario['perfil'] === 'admin' ? 'selected' : '' ?>>Gestor Escolar (Admin)</option>
                            <option value="cliente" <?= $usuario['perfil'] === 'cliente' ? 'selected' : '' ?>>Responsável (Cliente)</option>
                            <option value="usuario" <?= $usuario['perfil'] === 'usuario' ? 'selected' : '' ?>>Educador (Usuário)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nova Senha (opcional)</label>
                        <input type="password" name="senha" placeholder="********">
                    </div>

                    <button type="submit" class="btn-black-full" style="width:100%;margin-top:20px;">
                        <i class="fa-solid fa-save"></i> Atualizar Dados
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>
<script src="<?= BASE_URL ?>public/script.js"></script>
</body>
</html>
