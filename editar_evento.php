<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }
verificar_acesso(['admin']);

$pagina_atual = 'agenda';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM agenda WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $evento = $stmt->get_result()->fetch_assoc();
    if (!$evento) { die("Evento não encontrado!"); }
} else { header("Location: listar_eventos.php"); exit; }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento - CEIControl</title>
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
                    <h1>Editar Evento</h1>
                    <p>Gerencie as informações da agenda escolar.</p>
                </div>
                <a href="listar_eventos.php" class="btn-sm secondary" style="text-decoration:none;">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </header>

            <section class="content-wrapper-centered">
                <div class="form-card-centered">
                    <form action="processa_edicao_evento.php" method="POST" class="custom-form">
                        <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
                        
                        <div class="form-group">
                            <label><i class="fa-solid fa-tag"></i> Título do Evento</label>
                            <input type="text" name="titulo" value="<?php echo htmlspecialchars($evento['titulo']); ?>" placeholder="Digite o título" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-align-left"></i> Descrição</label>
                            <textarea name="descricao" rows="3" placeholder="Pauta ou detalhes..."><?php echo htmlspecialchars($evento['descricao']); ?></textarea>
                        </div>

                        <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                            <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                <label><i class="fa-solid fa-calendar"></i> Data</label>
                                <input type="date" name="data_evento" value="<?php echo $evento['data_evento']; ?>" required>
                            </div>
                            <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                <label><i class="fa-solid fa-clock"></i> Hora</label>
                                <input type="time" name="hora_evento" value="<?php echo $evento['hora_evento']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-location-dot"></i> Local</label>
                            <input type="text" name="local" value="<?php echo htmlspecialchars($evento['local'] ?? ''); ?>" placeholder="Ex: Pátio Central">
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-users"></i> Público Alvo</label>
                            <select name="publico_alvo">
                                <option value="Geral" <?php echo ($evento['publico_alvo'] == 'Geral') ? 'selected' : ''; ?>>Geral (Todos)</option>
                                <option value="Pais" <?php echo ($evento['publico_alvo'] == 'Pais') ? 'selected' : ''; ?>>Apenas Pais</option>
                                <option value="Funcionários" <?php echo ($evento['publico_alvo'] == 'Funcionários') ? 'selected' : ''; ?>>Apenas Funcionários</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-finalizar">
                            <i class="fa-solid fa-check"></i> Salvar Alterações
                        </button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>