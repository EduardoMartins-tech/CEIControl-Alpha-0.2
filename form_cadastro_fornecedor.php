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
    <title>Cadastro de Fornecedor</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h2>Cadastro de Fornecedor</h2>

    <form action="cadastrar_fornecedor.php" method="POST">
        <label>Nome do Fornecedor:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>CNPJ:</label><br>
        <input type="text" name="cnpj" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="painel_admin.php">Voltar ao painel</a></p>

</body>

</html>