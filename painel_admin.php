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
    <title>Painel Administrativo - CEIControl</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <header>
        <nav>
            <h1>CEIControl</h1>
            <div class="nav-buttons">
                <a href="logout.php" class="btn">Sair</a>
            </div>
        </nav>
    </header>

    <section id="hero">
        <h2>Painel Administrativo</h2>
        <p>Gerencie usuários, produtos, fornecedores, agenda e comunicação.</p>
    </section>

    <section id="funcionalidades">
        <div class="grid">

            <!-- Usuários -->
            <div>
                <h3>Usuários</h3>
                <a href="form_cadastro_usuario.php" class="btn">Cadastrar</a>
                <a href="listar_usuarios.php" class="btn-secundario">Listar</a>
            </div>

            <!-- Produtos e Serviços -->
            <div>
                <h3>Produtos e Serviços</h3>
                <a href="form_cadastro_produto.php" class="btn">Cadastrar</a>
                <a href="listar_produtos.php" class="btn-secundario">Listar</a>
            </div>

            <!-- Fornecedores -->
            <div>
                <h3>Fornecedores</h3>
                <a href="form_cadastro_fornecedor.php" class="btn">Cadastrar</a>
                <a href="listar_fornecedores.php" class="btn-secundario">Listar</a>
            </div>

            <!-- Agenda -->
            <div>
                <h3>Agenda</h3>
                <a href="form_cadastro_evento.php" class="btn">Cadastrar</a>
                <a href="listar_eventos.php" class="btn-secundario">Listar</a>
            </div>

            <!-- Comunicação -->
            <div>
                <h3>Comunicação</h3>
                <a href="mensagens.php" class="btn">Acessar Mensagens</a>
            </div>

        </div>
    </section>

</body>

</html>