<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM servicos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $servico = $stmt->get_result()->fetch_assoc();
    if (!$servico) { die("Serviço não encontrado!"); }
} else { header("Location: listar_estoque.php"); exit; }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Serviço - CEIControl</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <main class="main-content">
            <header class="dash-header">
                <h1>Editar Serviço</h1>
                <a href="listar_estoque.php" class="btn-sm secondary" style="text-decoration:none;">Voltar</a>
            </header>

            <section class="content-wrapper-centered">
                <div class="form-card-centered">
                    <form action="processa_edicao_servico.php" method="POST" class="custom-form">
                        <input type="hidden" name="id" value="<?php echo $servico['id']; ?>">
                        
                        <div class="form-group">
                            <label>Nome do Serviço</label>
                            <input type="text" name="nome" value="<?php echo htmlspecialchars($servico['nome']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name="descricao" rows="3"><?php echo htmlspecialchars($servico['descricao']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Preço (R$)</label>
                            <input type="number" step="0.01" name="preco" value="<?php echo $servico['preco']; ?>">
                        </div>

                        <button type="submit" class="btn-finalizar">Atualizar Serviço</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>