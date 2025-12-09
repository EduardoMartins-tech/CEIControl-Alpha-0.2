<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

// Verifica se ID foi passado
if (!isset($_GET['id'])) {
    echo "ID inválido.";
    exit;
}

$id = $_GET['id'];

// Busca os dados do item
$sql = "SELECT * FROM produtos_servicos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Registro não encontrado.";
    exit;
}

$dado = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto ou Serviço</title>
</head>

<body>

    <h2>Editar Produto ou Serviço</h2>

    <form action="atualizar_produto.php" method="POST">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="produto" <?= $dado['tipo'] === 'produto' ? 'selected' : '' ?>>Produto</option>
            <option value="serviço" <?= $dado['tipo'] === 'serviço' ? 'selected' : '' ?>>Serviço</option>
        </select><br><br>

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $dado['nome'] ?>" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"><?= $dado['descricao'] ?></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" value="<?= $dado['preco'] ?>" required><br><br>

        <label>Quantidade (somente para produtos):</label><br>
        <input type="number" name="quantidade" value="<?= $dado['quantidade'] ?>"><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <p><a href="listar_produtos.php">Cancelar</a></p>

</body>

</html>