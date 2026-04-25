<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin', 'usuario']);

$pagina_atual = 'estoque';

$produtos = $conn->query("SELECT * FROM produtos ORDER BY nome ASC");
$servicos = $conn->query("SELECT * FROM servicos ORDER BY nome ASC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Estoque e Serviços - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="assests/ceicontrol.png">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <header class="dash-header">
                <div class="header-welcome">
                    <h1>Produtos e Serviços</h1>
                    <p>Controle de materiais e manutenções solicitadas.</p>
                </div>
                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                <div style="display: flex; gap: 10px;">
                    <a href="cadastrar_produto.php" class="btn-black-full" style="width: auto; padding: 10px 20px; text-decoration: none;"><i class="fa-solid fa-plus"></i> Produto</a>
                    <a href="cadastrar_servico.php" class="btn-black-full" style="width: auto; padding: 10px 20px; text-decoration: none; background: #333;"><i class="fa-solid fa-plus"></i> Serviço</a>
                </div>
                <?php endif; ?>
            </header>

            <section class="content-wrapper">
                <h3 style="margin-bottom: 15px; color: var(--text-main);"><i class="fa-solid fa-box"></i> Produtos em Estoque</h3>
                <div class="table-container" style="margin-bottom: 40px;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço Unit.</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                                <th style="text-align: center;">Ações</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($produtos->num_rows === 0): ?>
                            <tr><td colspan="5" style="text-align:center; padding: 30px; color:#888;">Nenhum produto cadastrado.</td></tr>
                            <?php else: ?>
                            <?php while($p = $produtos->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($p['nome']); ?></td>
                                <td>R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo $p['quantidade']; ?></td>
                                <td><strong>R$ <?php echo number_format($p['preco'] * $p['quantidade'], 2, ',', '.'); ?></strong></td>
                                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                                <td class="actions-cell">
                                    <a href="atualizar_produto.php?id=<?php echo $p['id']; ?>" class="edit-btn" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="excluir_produto.php?id=<?php echo $p['id']; ?>" class="delete-btn" title="Excluir" onclick="return confirm('Excluir este produto?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <h3 style="margin-bottom: 15px; color: var(--text-main);"><i class="fa-solid fa-wrench"></i> Serviços Contratados</h3>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Serviço</th>
                                <th>Descrição</th>
                                <th>Preço Estimado</th>
                                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                                <th style="text-align: center;">Ações</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($servicos->num_rows === 0): ?>
                            <tr><td colspan="4" style="text-align:center; padding: 30px; color:#888;">Nenhum serviço cadastrado.</td></tr>
                            <?php else: ?>
                            <?php while($s = $servicos->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($s['nome']); ?></td>
                                <td><?php echo htmlspecialchars($s['descricao']); ?></td>
                                <td>R$ <?php echo number_format($s['preco'], 2, ',', '.'); ?></td>
                                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                                <td class="actions-cell">
                                    <a href="atualizar_servico.php?id=<?php echo $s['id']; ?>" class="edit-btn" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="excluir_servico.php?id=<?php echo $s['id']; ?>" class="delete-btn" title="Excluir" onclick="return confirm('Excluir este serviço?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
