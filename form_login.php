<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login - CEIControl</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <h2>Login do Sistema</h2>

    <?php
    if (isset($_GET['erro'])) {
        echo "<p style='color: red;'>E-mail, senha ou perfil inválidos.</p>";
    }
    ?>

    <form action="login_user.php" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <label>Perfil:</label><br>
        <select name="perfil" required>
            <option value="admin">Admin</option>
            <option value="cliente">Cliente</option>
            <option value="usuario">Usuário Comum</option>
        </select><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>

</html>