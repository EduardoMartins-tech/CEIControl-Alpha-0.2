<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">

    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <header class="dash-header">
                <div class="header-welcome">
                    <h1>Painel Administrativo</h1>
                    <p>Olá, bem-vindo ao centro de controle da CEI.</p>
                </div>
                <div class="header-profile">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=004d40&color=fff" alt="Admin">
                </div>
            </header>

            <section class="content-wrapper">
                <div class="welcome-banner">
                    <h2>O que você deseja gerenciar hoje?</h2>
                </div>

                <div class="grid-funcionalidades">
                    <div class="admin-card">
                        <div class="card-icon"><i class="fa-solid fa-user-shield"></i></div>
                        <div class="card-info">
                            <h3>Usuários</h3>
                            <p>Controle de acessos e perfis.</p>
                            <div class="card-actions">
                                <a href="form_cadastro_usuario.php" class="btn-sm primary">Cadastrar</a>
                                <a href="listar_usuarios.php" class="btn-sm">Listar</a>
                            </div>
                        </div>
                    </div>

                    <div class="admin-card">
                        <div class="card-icon"><i class="fa-solid fa-box"></i></div>
                        <div class="card-info">
                            <h3>Produtos e Serviços</h3>
                            <p>Gestão de itens e inventário.</p>
                            <div class="card-actions">
                                <a href="form_cadastro_produto.php" class="btn-sm primary">Cadastrar</a>
                                <a href="listar_produtos.php" class="btn-sm">Listar</a>
                            </div>
                        </div>
                    </div>

                    <div class="admin-card">
                        <div class="card-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="card-info">
                            <h3>Fornecedores</h3>
                            <p>Logística e parceiros.</p>
                            <div class="card-actions">
                                <a href="form_cadastro_fornecedor.php" class="btn-sm primary">Cadastrar</a>
                                <a href="listar_fornecedores.php" class="btn-sm">Listar</a>
                            </div>
                        </div>
                    </div>

                    <div class="admin-card">
                        <div class="card-icon"><i class="fa-solid fa-calendar-check"></i></div>
                        <div class="card-info">
                            <h3>Agenda</h3>
                            <p>Eventos e cronograma escolar.</p>
                            <div class="card-actions">
                                <a href="form_cadastro_evento.php" class="btn-sm primary">Cadastrar</a>
                                <a href="listar_eventos.php" class="btn-sm">Listar</a>
                            </div>
                        </div>
                    </div>

                    <div class="admin-card full-width">
                        <div class="card-icon"><i class="fa-solid fa-comments"></i></div>
                        <div class="card-info">
                            <h3>Comunicação</h3>
                            <p>Acesse as mensagens e comunicados internos.</p>
                            <div class="card-actions">
                                <a href="chat.php" class="btn-sm primary">Acessar Mensagens</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>
</html>