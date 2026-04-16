<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);

$pagina_atual = 'fornecedores';

// Busca todos os fornecedores
$sql = "SELECT * FROM fornecedores ORDER BY nome ASC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fornecedores - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <header class="dash-header">
                <div class="header-welcome">
                    <h1>Fornecedores</h1>
                    <p>Gestão de parceiros e fornecedores da unidade.</p>
                </div>
                <a href="cadastrar_fornecedor.php" class="btn-sm primary" style="text-decoration: none;">
                    <i class="fa-solid fa-plus"></i> Novo Fornecedor
                </a>
            </header>

            <section class="content-wrapper">
                <div class="full-width-card" style="padding: 20px; border-radius: 15px;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($forn = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?php echo $forn['nome']; ?></strong></td>
                                <td><?php echo $forn['cnpj']; ?></td>
                                <td><?php echo $forn['email']; ?></td>
                                <td><?php echo $forn['telefone']; ?></td>
                                <td style="text-align: center;">
                                    <a href="atualizar_fornecedor.php?id=<?php echo $forn['id']; ?>" class="btn-icon edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="excluir_fornecedor.php?id=<?php echo $forn['id']; ?>" class="btn-icon delete" onclick="return confirm('Excluir este fornecedor?')"><i class="fa-solid fa-trash"></i></a>
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