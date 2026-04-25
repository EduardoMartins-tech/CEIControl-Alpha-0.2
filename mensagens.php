<?php
session_start();
if (!isset($_SESSION['perfil'])) {
  header("Location: form_login.php");
  exit;
}

include('database.php');

$meu_id = $_SESSION['id'];

// Verifica se há destinatário selecionado
$destinatario_id = isset($_GET['destinatario_id']) ? intval($_GET['destinatario_id']) : null;

// Lista de contatos:
if ($_SESSION['perfil'] === 'admin') {
  $usuarios = $conn->query("SELECT id, nome FROM usuarios WHERE id != $meu_id");
} else {
  $usuarios = $conn->query("SELECT id, nome FROM usuarios WHERE perfil = 'admin'");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Mensagens</title>
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

  <div class="chat-container">

    <!-- Lista de contatos -->
    <div class="sidebar">
      <h3>Conversas</h3>
      <ul class="contatos">
        <?php while ($usuario = $usuarios->fetch_assoc()): ?>
          <li>
            <a href="mensagens.php?destinatario_id=<?= $usuario['id'] ?>">
              <?= htmlspecialchars($usuario['nome']) ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <!-- Janela de conversa -->
    <div class="chat-window">
      <div class="chat-header">
        <?php
        if ($destinatario_id) {
          $dest = $conn->query("SELECT nome FROM usuarios WHERE id = $destinatario_id")->fetch_assoc();
          echo "<h4>Conversando com: " . htmlspecialchars($dest['nome']) . "</h4>";
        } else {
          echo "<h4>Selecione um contato para iniciar a conversa</h4>";
        }
        ?>
      </div>

      <div class="chat-messages">
        <?php
        if ($destinatario_id) {
          $stmt = $conn->prepare("SELECT * FROM mensagens 
                                WHERE (remetente_id = ? AND destinatario_id = ?) 
                                   OR (remetente_id = ? AND destinatario_id = ?) 
                                ORDER BY data_envio ASC");
          $stmt->bind_param("iiii", $meu_id, $destinatario_id, $destinatario_id, $meu_id);
          $stmt->execute();
          $result = $stmt->get_result();

          while ($msg = $result->fetch_assoc()):
            $classe = $msg['remetente_id'] == $meu_id ? 'enviada' : 'recebida';
            ?>
            <div class="mensagem <?= $classe ?>">
              <?= htmlspecialchars($msg['mensagem']) ?>
            </div>
          <?php endwhile; ?>
        <?php } ?>
      </div>

      <?php if ($destinatario_id): ?>
        <form class="chat-input" action="enviar_mensagem.php" method="POST">
          <input type="hidden" name="destinatario_id" value="<?= $destinatario_id ?>">
          <input type="text" name="mensagem" placeholder="Digite sua mensagem..." required>
          <button type="submit">Enviar</button>
        </form>
      <?php endif; ?>
    </div>

  </div>

</body>

</html>