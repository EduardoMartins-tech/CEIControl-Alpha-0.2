<?php
session_start();
// Proteção de acesso
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

include('database.php');

if (!isset($_GET['id'])) {
    header("Location: listar_usuarios.php?erro=id_invalido");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    header("Location: listar_usuarios.php?erro=usuario_nao_encontrado");
    exit;
}

$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - CEIControl</title>
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
                    <h1>Editar Cadastro</h1>
                    <p>Modificando os dados de: <strong><?= htmlspecialchars($usuario['nome']) ?></strong></p>
                </div>
                <a href="listar_usuarios.php" class="btn-black-full" style="width: auto; padding: 10px 25px; background: #666;">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </header>

            <section class="content-wrapper">
                <div class="admin-card" style="max-width: 600px; margin: 0 auto; display: block;">
                    
                    <form action="processa_edit_usuario.php" method="POST" class="custom-form">
                        
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail de Acesso</label>
                            <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="perfil">Perfil de Acesso</label>
                            <select name="perfil" id="perfil" required>
                                <option value="admin" <?= $usuario['perfil'] === 'admin' ? 'selected' : '' ?>>Gestor Escolar (Admin)</option>
                                <option value="cliente" <?= $usuario['perfil'] === 'cliente' ? 'selected' : '' ?>>Responsável (Cliente)</option>
                                <option value="usuario" <?= $usuario['perfil'] === 'usuario' ? 'selected' : '' ?>>Educador (Usuário)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
                            <input type="password" name="senha" id="senha" placeholder="********">
                        </div>

                        <button type="submit" class="btn-black-full" style="width: 100%; margin-top: 20px;">
                            <i class="fa-solid fa-save"></i> Atualizar Dados
                        </button>
                    </form>

                </div>
            </section>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>