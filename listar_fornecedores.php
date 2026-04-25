<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);
$pagina_atual = 'fornecedores';

$resultado = $conn->query("SELECT * FROM fornecedores ORDER BY nome ASC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fornecedores - CEIControl</title>
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
                    <h1>Fornecedores</h1>
                    <p>Gestão de parceiros e fornecedores da unidade.</p>
                </div>
                <a href="cadastrar_fornecedor.php" class="btn-black-full" style="width: auto; padding: 10px 20px; text-decoration: none;">
                    <i class="fa-solid fa-plus"></i> Novo Fornecedor
                </a>
            </header>
            <section class="content-wrapper">
                <div class="table-container">
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
                            <?php if ($resultado->num_rows === 0): ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 30px; color: #888;">Nenhum fornecedor cadastrado.</td>
                            </tr>
                            <?php else: ?>
                            <?php while($forn = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($forn['nome']); ?></strong></td>
                                <td><?php echo htmlspecialchars($forn['cnpj']); ?></td>
                                <td><?php echo htmlspecialchars($forn['email']); ?></td>
                                <td><?php echo htmlspecialchars($forn['telefone']); ?></td>
                                <td class="actions-cell">
                                    <a href="atualizar_fornecedor.php?id=<?php echo $forn['id']; ?>" class="edit-btn" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="excluir_fornecedor.php?id=<?php echo $forn['id']; ?>" class="delete-btn" title="Excluir" onclick="return confirm('Excluir este fornecedor?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
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
