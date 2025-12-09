<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'cliente') {
    header("Location: form_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Painel do Cliente</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <header>
        <h1>CEIControl</h1>
        <div class="nav-buttons">
            <a href="logout.php" class="btn">Sair</a>
        </div>
    </header>

    <section id="hero">
        <h2>Bem-vindo(a), <?= $_SESSION['nome']; ?>!</h2>
        <p>Painel do Responsável</p>
    </section>

    <section class="painel-opcoes">
        <div class="box">
            <h3>Agenda</h3>
            <a href="listar_eventos.php" class="btn">Ver Agenda da CEI</a>
        </div>
        <div class="box">
            <h3>Comunicação</h3>
            <a href="mensagens.php" class="btn">Falar com a Coordenação</a>
        </div>
    </section>
</body>

</html>