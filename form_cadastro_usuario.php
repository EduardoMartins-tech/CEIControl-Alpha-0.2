<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário - CEIControl</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastro_usuario.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

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

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>