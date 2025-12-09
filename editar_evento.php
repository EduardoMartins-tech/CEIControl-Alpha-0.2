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
$sql = "SELECT * FROM agenda WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Evento não encontrado.";
    exit;
}

$evento = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
</head>

<body>

    <h2>Editar Evento da Agenda</h2>

    <form action="atualizar_evento.php" method="POST">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">

        <label>Título:</label><br>
        <input type="text" name="titulo" value="<?= $evento['titulo'] ?>" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"><?= $evento['descricao'] ?></textarea><br><br>

        <label>Data do Evento:</label><br>
        <input type="date" name="data_evento" value="<?= $evento['data_evento'] ?>" required><br><br>

        <label>Público-Alvo:</label><br>
        <select name="publico_alvo">
            <option value="Pais" <?= $evento['publico_alvo'] == 'Pais' ? 'selected' : '' ?>>Pais</option>
            <option value="Funcionários" <?= $evento['publico_alvo'] == 'Funcionários' ? 'selected' : '' ?>>Funcionários
            </option>
            <option value="Geral" <?= $evento['publico_alvo'] == 'Geral' ? 'selected' : '' ?>>Geral</option>
        </select><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <p><a href="listar_eventos.php">Cancelar</a></p>

</body>

</html>