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

$sql = "SELECT * FROM fornecedores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Fornecedor não encontrado.";
    exit;
}

$fornecedor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Fornecedor</title>
</head>

<body>

    <h2>Editar Fornecedor</h2>

    <form action="atualizar_fornecedor.php" method="POST">
        <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $fornecedor['nome'] ?>" required><br><br>

        <label>CNPJ:</label><br>
        <input type="text" name="cnpj" value="<?= $fornecedor['cnpj'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $fornecedor['email'] ?>"><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $fornecedor['telefone'] ?>"><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <p><a href="listar_fornecedores.php">Cancelar</a></p>

</body>

</html>