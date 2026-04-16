<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);
$pagina_atual = 'estoque';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Serviço - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        
        <main class="main-content">
            <header class="dash-header">
                <div>
                    <h1>Novo Serviço</h1>
                    <p>Solicite ou registre uma manutenção para a unidade.</p>
                </div>
                <a href="listar_estoque.php" class="btn-sm secondary" style="text-decoration:none;"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </header>

            <section class="content-wrapper-centered">
                <div class="form-card-centered">
                    <form action="processa_cadastro_servico.php" method="POST" class="custom-form">
                        <div class="form-group">
                            <label><i class="fa-solid fa-wrench"></i> Nome do Serviço</label>
                            <input type="text" name="nome" placeholder="Ex: Pintura da Sala 04" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-align-left"></i> Descrição / Observações</label>
                            <textarea name="descricao" rows="3" placeholder="Detalhes sobre a necessidade do serviço..."></textarea>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-comment-dollar"></i> Preço Estimado (R$)</label>
                            <input type="number" step="0.01" name="preco" placeholder="0.00">
                        </div>

                        <button type="submit" class="btn-finalizar">
                            <i class="fa-solid fa-check"></i> Registrar Serviço
                        </button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>