<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/UsuarioController.php';

$controller = new UsuarioController($conn);
$usuario = isset($_GET['id']) ? $controller->buscar((int)$_GET['id']) : null;

if (!$usuario) {
    header("Location: " . BASE_URL . "usuarios?erro=nao_encontrado");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail de Acesso</label>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="perfil">Perfil de Acesso</label>
                        <select name="perfil" id="perfil" required>
                            <option value="admin" <?= ($usuario['perfil'] ?? '') === 'admin' ? 'selected' : '' ?>>Gestor Escolar (Admin)</option>
                            <option value="cliente" <?= ($usuario['perfil'] ?? '') === 'cliente' ? 'selected' : '' ?>>Responsável (Cliente)</option>
                            <option value="usuario" <?= ($usuario['perfil'] ?? '') === 'usuario' ? 'selected' : '' ?>>Educador (Usuário)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="senha">Nova Senha (opcional)</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="password" name="senha" id="senha" placeholder="********"
                                   onfocus="const r = document.getElementById('senha-regras'); if(r) r.style.display='block';" 
                                   onblur="const r = document.getElementById('senha-regras'); if(r) r.style.display='none';">
                            <button type="button" onclick="toggleSenhaVisibilidade('senha', 'btn-senha')" id="btn-senha" 
                                    style="padding: 10px; border:1px solid #ccc; background:#f4f4f4; cursor: pointer;">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <ul id="senha-regras">
                            <li id="req-min" class="invalido"><i class="fa-solid fa-circle-check"></i> Mínimo de 6 caracteres</li>
                            <li id="req-mai" class="invalido"><i class="fa-solid fa-circle-check"></i> Pelo menos uma letra maiúscula</li>
                            <li id="req-num" class="invalido"><i class="fa-solid fa-circle-check"></i> Pelo menos um número</li>
                        </ul>
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
