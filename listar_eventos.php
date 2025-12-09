<?php
include('acesso_admin.php');

verificar_acesso(['admin', 'cliente', 'usuario']); // Todos podem ver a agenda

$sql = "SELECT * FROM agenda ORDER BY data_evento ASC";
$result = $conn->query($sql);

$pode_editar = $_SESSION['perfil'] === 'admin';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Agenda de Eventos</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h2>Agenda de Eventos</h2>
    <p><a href="painel_admin.php">Voltar ao painel</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data do Evento</th>
                <th>Público-Alvo</th>
                <th>Descrição</th>
                <?php if ($pode_editar): ?>
                    <th>Ações</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($evento = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $evento['id'] ?></td>
                    <td><?= $evento['titulo'] ?></td>
                    <td><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></td>
                    <td><?= $evento['publico_alvo'] ?></td>
                    <td><?= $evento['descricao'] ?></td>
                    <?php if ($pode_editar): ?>
                        <td>
                            <a href="editar_evento.php?id=<?= $evento['id'] ?>">Editar</a> |
                            <a href="excluir_evento.php?id=<?= $evento['id'] ?>"
                                onclick="return confirm('Deseja excluir este evento?')">Excluir</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>