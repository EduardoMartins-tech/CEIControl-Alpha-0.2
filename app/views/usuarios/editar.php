<?php
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: " . BASE_URL . "login");
    exit;
}

$pagina_atual = 'usuarios';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário - CEIControl</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include __DIR__ . '/../../../sidebar.php'; ?>
    <main class="main-content">
        <header class="dash-header">
            <div class="header-welcome">
                <h1>Cadastrar Usuário</h1>
            </div>
            <a href="<?= BASE_URL ?>usuarios" class="btn-black-full" style="width:auto;padding:10px 25px;background:#666;">
                <i class="fa-solid fa-arrow-left"></i> Voltar
            </a>
        </header>

        <section class="content-wrapper">
            <div class="admin-card" style="max-width:600px;margin:0 auto;display:block;">
                <form action="<?= BASE_URL ?>usuarios/salvar" method="POST" class="custom-form">
                    
                    <div class="form-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome" required placeholder="Digite o nome completo">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail de Acesso</label>
                        <input type="email" name="email" id="email" required placeholder="exemplo@email.com">
                    </div>

                    <div class="form-group">
                        <label for="perfil">Perfil de Acesso</label>
                        <select name="perfil" id="perfil" required>
                            <option value="admin">Gestor Escolar (Admin)</option>
                            <option value="cliente">Responsável (Cliente)</option>
                            <option value="usuario">Educador (Usuário)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="password" name="senha" id="senha" placeholder="********" required
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
                        <i class="fa-solid fa-user-plus"></i> Cadastrar Usuário
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>
<script src="<?= BASE_URL ?>public/script.js"></script>
</body>
</html>
