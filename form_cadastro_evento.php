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
    <title>Cadastrar Evento na Agenda</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h2>Cadastrar Evento na Agenda</h2>

    <form action="cadastrar_evento.php" method="POST">
        <label>Título do Evento:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Data do Evento:</label><br>
        <input type="date" name="data_evento" required><br><br>

        <label>Público-alvo:</label><br>
        <select name="publico_alvo">
            <option value="Pais">Pais</option>
            <option value="Funcionários">Funcionários</option>
            <option value="Geral" selected>Geral</option>
        </select><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="painel_admin.php">Voltar ao painel</a></p>

</body>

</html>