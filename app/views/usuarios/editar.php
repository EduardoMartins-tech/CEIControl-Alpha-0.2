<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../app/controllers/UsuarioController.php';

$controller = new UsuarioController($conn);
$usuario    = isset($_GET['id']) ? $controller->buscar((int)$_GET['id']) : null;
$pagina_atual = 'usuarios';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - CEIControl</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>public/assets/ceicontrol.png">
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

        <section class="content-wrapper-centered">
            <div class="form-card-centered">
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
                            <option value="admin"    <?= $usuario['perfil'] === 'admin'    ? 'selected' : '' ?>>Gestor Escolar (Admin)</option>
                            <option value="cliente"  <?= $usuario['perfil'] === 'cliente'  ? 'selected' : '' ?>>Responsável (Cliente)</option>
                            <option value="usuario"  <?= $usuario['perfil'] === 'usuario'  ? 'selected' : '' ?>>Educador (Usuário)</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label>Nova Senha (opcional)</label>
                            <div style="position: relative;">
                                <input type="password" id="senha" name="senha" placeholder="********">
                                <button type="button" id="btn-senha" onclick="toggleSenhaVisibilidade('senha','btn-senha')" 
                                    style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-sub);">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <ul id="senha-regras">
                                <li id="req-min" class="invalido"><i class="fa-solid fa-circle-xmark"></i> Mínimo 6 caracteres</li>
                                <li id="req-mai" class="invalido"><i class="fa-solid fa-circle-xmark"></i> Uma letra maiúscula</li>
                                <li id="req-num" class="invalido"><i class="fa-solid fa-circle-xmark"></i> Um número</li>
                            </ul>
                        </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-finalizar">
                            <i class="fa-solid fa-save"></i> Atualizar Dados
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>
