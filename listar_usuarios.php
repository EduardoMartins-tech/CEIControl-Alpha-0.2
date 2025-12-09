<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$sql = "SELECT id, nome, email, perfil FROM usuarios ORDER BY nome ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <header>
        <nav>
            <h1>CEIControl</h1>
            <div class="nav-buttons">
                <a href="painel_admin.php" class="btn-secundario">Painel</a>
                <a href="logout.php" class="btn">Sair</a>
            </div>
        </nav>
    </header>
    <section id="hero">
        <h2>Usuários Cadastrados</h2>
        <p>Gerencie os perfis cadastrados no sistema CEIControl.</p>
    </section>

    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= ucfirst($usuario['perfil']) ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn-secundario">Editar</a>
                            <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>" class="btn"
                                onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

</body>

</html>