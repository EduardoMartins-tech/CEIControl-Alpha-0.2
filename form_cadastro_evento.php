<?php
session_start();
// Proteção de Perfil: Apenas Admin e Educador
if (!isset($_SESSION['perfil']) || ($_SESSION['perfil'] !== 'admin' && $_SESSION['perfil'] !== 'usuario')) {
    header("Location: form_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Evento - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">

    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <header class="dash-header">
                <div class="header-welcome">
                    <h1>Cadastrar Novo Evento</h1>
                    <p>Adicione atividades, reuniões ou avisos à agenda da CEI.</p>
                </div>
            </header>

            <section class="content-wrapper">
                <div class="form-container-full">
                    <form action="processa_cadastro_evento.php" method="POST" class="custom-form">
                        
                        <div class="form-group">
                            <label for="titulo">Título do Evento</label>
                            <input type="text" id="titulo" name="titulo" placeholder="Ex: Festa da Primavera" required>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição / Detalhes</label>
                            <textarea id="descricao" name="descricao" rows="3" placeholder="O que vai acontecer nesse evento?"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_evento">Data do Evento</label>
                                <input type="date" id="data_evento" name="data_evento" min="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="hora_evento">Horário</label>
                                <input type="time" id="hora_evento" name="hora_evento">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="local">Local</label>
                                <input type="text" id="local" name="local" placeholder="Ex: Pátio ou Sala 02">
                            </div>
                            <div class="form-group">
                                <label for="publico_alvo">Público-Alvo</label>
                                <select id="publico_alvo" name="publico_alvo">
                                    <option value="Geral">Geral (Todos)</option>
                                    <option value="Pais">Apenas Pais</option>
                                    <option value="Funcionários">Apenas Funcionários</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-black-full">
                                <i class="fa-solid fa-calendar-check"></i> Salvar na Agenda
                            </button>
                            <a href="listar_eventos.php" class="btn-cancel">Cancelar</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>
</html>