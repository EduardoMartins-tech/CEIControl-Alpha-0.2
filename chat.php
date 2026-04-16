<?php
session_start();
include 'database.php';

if (!isset($_SESSION['usuario_id'])) { 
    header("Location: form_login.php"); 
    exit; 
}

$pagina_atual = 'comunicacao';
$meu_id = $_SESSION['usuario_id'];
$id_contato = isset($_GET['id_contato']) ? intval($_GET['id_contato']) : 0;

// Busca dados do contato para a lateral e cabeçalho
$contato_nome = "Selecione um contato";
$contato_perfil = "";
if ($id_contato > 0) {
    $res_contato = $conn->query("SELECT nome, perfil FROM usuarios WHERE id = $id_contato");
    if ($user_data = $res_contato->fetch_assoc()) {
        $contato_nome = $user_data['nome'];
        $contato_perfil = $user_data['perfil'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Chat - CEIControl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dashboard-body">

    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>

        <main class="main-content chat-main">
            <div class="chat-container">
                
                <aside class="chat-sidebar">
                    <div class="chat-search">
                        <h3>Conversas</h3>
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="filterContacts" placeholder="Pesquisar..." onkeyup="filtrarContatos()">
                        </div>
                    </div>
                    <ul class="contacts-list" id="contactsList">
                        <?php
                        $usuarios = $conn->query("SELECT id, nome, perfil FROM usuarios WHERE id != $meu_id");
                        while($u = $usuarios->fetch_assoc()):
                        ?>
                        <li class="contact-item <?= ($id_contato == $u['id']) ? 'active' : '' ?>" 
                            onclick="location.href='chat.php?id_contato=<?= $u['id'] ?>'">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($u['nome']) ?>&background=random" alt="Avatar">
                            <div class="contact-info">
                                <h4><?= htmlspecialchars($u['nome']) ?></h4>
                                <p><?= ucfirst($u['perfil']) ?></p>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </aside>

                <section class="chat-window">
                    <?php if ($id_contato > 0): ?>
                    <header class="chat-header">
                        <div class="user-details">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($contato_nome) ?>&background=random" alt="Avatar">
                            <div>
                                <h4><?= htmlspecialchars($contato_nome) ?></h4>
                                <span>Online Agora</span>
                            </div>
                        </div>
                        <div class="header-actions">
                            <i class="fa-solid fa-phone" onclick="alert('Chamada de voz em desenvolvimento')"></i>
                            <i class="fa-solid fa-video" onclick="alert('Chamada de vídeo em desenvolvimento')"></i>
                        </div>
                    </header>

                    <div class="chat-messages" id="message-container">
                        <?php
                        $msg_query = "SELECT * FROM mensagens 
                                      WHERE (remetente_id = $meu_id AND destinatario_id = $id_contato)
                                      OR (remetente_id = $id_contato AND destinatario_id = $meu_id)
                                      ORDER BY data_envio ASC";
                        $mensagens = $conn->query($msg_query);

                        while($m = $mensagens->fetch_assoc()):
                            $classe = ($m['remetente_id'] == $meu_id) ? 'sent' : 'received';
                        ?>
                            <div class="message <?= $classe ?>">
                                <p><?= htmlspecialchars($m['mensagem']) ?></p>
                                <small style="font-size: 0.6rem; opacity: 0.7; display: block; text-align: right; margin-top: 5px;">
                                    <?= date('H:i', strtotime($m['data_envio'])) ?>
                                </small>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <footer class="chat-input-area">
                        <form action="enviar_mensagens.php" method="POST" class="input-wrapper">
                            <input type="hidden" name="destinatario_id" value="<?= $id_contato ?>">
                            <input type="text" name="mensagem" id="msgInput" placeholder="Digite sua mensagem..." required autocomplete="off">
                            <div class="input-icons">
                                <i class="fa-regular fa-face-smile" onclick="alert('Dica: Use Win + . para emojis')"></i>
                                <label for="file-upload" style="cursor:pointer"><i class="fa-solid fa-paperclip"></i></label>
                                <input id="file-upload" type="file" style="display:none;" onchange="alert('Upload de arquivos será implementado em breve')"/>
                                <button type="submit" class="send-btn">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </footer>
                    <?php else: ?>
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #888;">
                            <i class="fa-solid fa-comments" style="font-size: 4rem; margin-bottom: 20px; opacity: 0.2;"></i>
                            <h3>Selecione uma conversa para começar</h3>
                        </div>
                    <?php endif; ?>
                </section>

                <aside class="chat-profile-info">
                    <?php if ($id_contato > 0): ?>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($contato_nome) ?>&background=random&size=128" alt="Profile">
                    <h3><?= htmlspecialchars($contato_nome) ?></h3>
                    <p style="color: #00a98f; font-weight: bold; margin-bottom: 20px;"><?= ucfirst($contato_perfil) ?></p>
                    
                    <button class="btn-profile" onclick="alert('Perfil de: <?= $contato_nome ?>')">Ver Perfil Completo</button>
                    
                    <ul class="profile-options">
                        <li onclick="ativarPesquisa()"><i class="fa-solid fa-magnifying-glass"></i> Pesquisar Mensagem</li>
                        <li><i class="fa-regular fa-image"></i> Imagens Enviadas</li>
                        <li><i class="fa-solid fa-ellipsis"></i> Outras Opções</li>
                    </ul>
                    <?php else: ?>
                        <p style="text-align: center; color: #999;">Nenhum contato selecionado</p>
                    <?php endif; ?>
                </aside>

            </div>
        </main>
    </div>

    <script>
        // Rolar para o fim
        var objDiv = document.getElementById("message-container");
        if(objDiv) objDiv.scrollTop = objDiv.scrollHeight;

        // Pesquisa de Mensagens na tela
        function ativarPesquisa() {
            let termo = prompt("O que você deseja buscar nesta conversa?");
            if (termo) {
                let msgs = document.querySelectorAll('.message p');
                let encontrou = false;
                msgs.forEach(m => {
                    if (m.innerText.toLowerCase().includes(termo.toLowerCase())) {
                        m.parentElement.style.backgroundColor = "#fff3cd"; // Destaque amarelo
                        m.scrollIntoView();
                        encontrou = true;
                    } else {
                        m.parentElement.style.backgroundColor = ""; 
                    }
                });
                if(!encontrou) alert("Nenhuma mensagem encontrada com esse termo.");
            }
        }

        // Filtro de contatos na sidebar
        function filtrarContatos() {
            let input = document.getElementById('filterContacts').value.toLowerCase();
            let items = document.querySelectorAll('.contact-item');
            items.forEach(item => {
                let nome = item.querySelector('h4').innerText.toLowerCase();
                item.style.display = nome.includes(input) ? "flex" : "none";
            });
        }
    </script>
</body>
</html>