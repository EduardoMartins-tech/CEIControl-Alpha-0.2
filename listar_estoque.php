<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);

$pagina_atual = 'estoque';

// Busca Produtos e Serviços
$produtos = $conn->query("SELECT * FROM produtos ORDER BY nome ASC");
$servicos = $conn->query("SELECT * FROM servicos ORDER BY nome ASC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Estoque e Serviços - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <div style="display: flex; gap: 10px;">
                    <a href="cadastrar_produto.php" class="btn-sm primary" style="text-decoration: none;">+ Produto</a>
                    <a href="cadastrar_servico.php" class="btn-sm secondary" style="text-decoration: none;">+ Serviço</a>
                </div>
            </header>

            <section class="content-wrapper">
                <h3 style="margin-bottom: 15px; color: var(--text-main);"><i class="fa-solid fa-box"></i> Produtos em Estoque</h3>
                <div class="full-width-card" style="padding: 20px; border-radius: 15px; margin-bottom: 40px;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço Unit.</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($p = $produtos->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $p['nome']; ?></td>
                                <td>R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo $p['quantidade']; ?></td>
                                <td><strong>R$ <?php echo number_format($p['preco'] * $p['quantidade'], 2, ',', '.'); ?></strong></td>
                                <td style="text-align: center;">
                                    <a href="atualizar_produto.php?id=<?php echo $p['id']; ?>" class="btn-icon edit"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <h3 style="margin-bottom: 15px; color: var(--text-main);"><i class="fa-solid fa-wrench"></i> Serviços Contratados</h3>
                <div class="full-width-card" style="padding: 20px; border-radius: 15px;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Serviço</th>
                                <th>Descrição</th>
                                <th>Preço Estimado</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($s = $servicos->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $s['nome']; ?></td>
                                <td><?php echo $s['descricao']; ?></td>
                                <td>R$ <?php echo number_format($s['preco'], 2, ',', '.'); ?></td>
                                <td style="text-align: center;">
                                    <a href="atualizar_servico.php?id=<?php echo $s['id']; ?>" class="btn-icon edit"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>