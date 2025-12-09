<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

if (!isset($_GET['id'])) {
    echo "ID inválido.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Usuário não encontrado.";
    exit;
}

$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <header>
        <nav>
            <h1>CEIControl</h1>
            <div class="nav-buttons">
                <a href="painel_admin.php">Painel</a>
                <a href="logout.php">Sair</a>
            </div>
        </nav>
    </header>

    <section id="hero">
        <h2>Editar Usuário</h2>
    </section>

    <form action="atualizar_usuario.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

        <label>Perfil:</label>
        <select name="perfil" required>
            <option value="admin" <?= $usuario['perfil'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="cliente" <?= $usuario['perfil'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
            <option value="usuario" <?= $usuario['perfil'] === 'usuario' ? 'selected' : '' ?>>Usuário</option>
        </select>

        <button type="submit">Atualizar</button>
    </form>

</body>

</html>