<?php
include('acesso_admin.php');
if (!isset($conn)) { include('database.php'); }

// Proteção: Só Admin pode editar eventos
verificar_acesso(['admin']);

$pagina_atual = 'agenda';

// Verifica se recebeu o identificador (titulo) pela URL
if (isset($_GET['id'])) {
    $identificador = $_GET['id'];
    
    // Busca os dados atuais do evento baseado no título
    $stmt = $conn->prepare("SELECT * FROM agenda WHERE titulo = ?");
    $stmt->bind_param("s", $identificador);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $evento = $resultado->fetch_assoc();

    if (!$evento) {
        die("Evento não encontrado!");
    }
} else {
    header("Location: listar_eventos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">

    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <header class="dash-header">
                <div class="header-welcome">
                    <h1>Editar Evento</h1>
                    <p>Altere as informações abaixo para atualizar a agenda.</p>
                </div>
                <a href="listar_eventos.php" class="btn-voltar">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </header>

            <section class="content-wrapper-centered">
                <div class="form-card-centered">
                    <form action="processa_edicao_evento.php" method="POST" class="custom-form">
                        
                        <input type="hidden" name="titulo_original" value="<?php echo htmlspecialchars($evento['titulo']); ?>">

                        <div class="form-group">
                            <label>Título do Evento</label>
                            <input type="text" name="titulo" value="<?php echo htmlspecialchars($evento['titulo']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name="descricao" rows="3"><?php echo htmlspecialchars($evento['descricao'] ?? $evento['descricão']); ?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="data_evento" value="<?php echo $evento['data_evento']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Hora</label>
                                <input type="time" name="hora_evento" value="<?php echo $evento['hora_evento']; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Local</label>
                                <input type="text" name="local" value="<?php echo htmlspecialchars($evento['local']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Público Alvo</label>
                                <select name="publico_alvo">
                                    <option value="Geral" <?php echo ($evento['publico_alvo'] == 'Geral') ? 'selected' : ''; ?>>Geral (Todos)</option>
                                    <option value="Pais" <?php echo ($evento['publico_alvo'] == 'Pais') ? 'selected' : ''; ?>>Apenas Pais</option>
                                    <option value="Funcionários" <?php echo ($evento['publico_alvo'] == 'Funcionários') ? 'selected' : ''; ?>>Apenas Funcionários</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn-finalizar">
                            <i class="fa-solid fa-calendar-check"></i> Atualizar Evento
                        </button>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>
</html>