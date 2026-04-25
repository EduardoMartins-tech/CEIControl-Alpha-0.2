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
    <title>Cadastro de Produto ou Serviço</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" type="image/png" href="assests/ceicontrol.png">
</head>

<body>

    <h2>Cadastro de Produto ou Serviço</h2>

    <form action="cadastrar_produto.php" method="POST">
        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="produto">Produto</option>
            <option value="serviço">Serviço</option>
        </select><br><br>

        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" required><br><br>

        <label>Quantidade (somente para produtos):</label><br>
        <input type="number" name="quantidade" min="0"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="painel_admin.php">Voltar ao painel</a></p>

</body>

</html>