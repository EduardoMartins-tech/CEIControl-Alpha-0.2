<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

$sql = "SELECT * FROM fornecedores ORDER BY data_cadastro DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h2>Fornecedores Cadastrados</h2>
    <p><a href="painel_admin.php">Voltar ao painel</a></p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['cnpj'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telefone'] ?></td>
                    <td><?= date('d/m/Y', strtotime($row['data_cadastro'])) ?></td>
                    <td>
                        <a href="editar_fornecedor.php?id=<?= $row['id'] ?>">Editar</a> |
                        <a href="excluir_fornecedor.php?id=<?= $row['id'] ?>"
                            onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>