<?php
session_start();
include('database.php');

// Verifica se o usuário está logado (qualquer perfil pode enviar mensagem no CEIControl)
if (!isset($_SESSION['usuario_id'])) {
    header("Location: form_login.php");
    exit;
}

// Verifica se os dados vieram via POST e não estão vazios
if (isset($_POST['destinatario_id']) && !empty(trim($_POST['mensagem']))) {
    
    $remetente_id = $_SESSION['usuario_id']; // Usando o nome da sessão do seu login.php
    $destinatario_id = $_POST['destinatario_id'];
    $mensagem = trim($_POST['mensagem']); // trim remove espaços vazios acidentais

    // Prepara o SQL (sua tabela tem o campo 'mensagem' ou 'texto'? Ajuste conforme seu print anterior)
    // Pelo seu print do phpMyAdmin, o campo era 'mensagem' mesmo.
    $sql = "INSERT INTO mensagens (remetente_id, destinatario_id, mensagem, data_envio) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $remetente_id, $destinatario_id, $mensagem);

    if ($stmt->execute()) {
        // Volta para o chat mantendo a conversa aberta com o destinatário
        header("Location: chat.php?id_contato=$destinatario_id");
        exit;
    } else {
        echo "Erro ao enviar: " . $stmt->error;
    }
} else {
    // Se tentarem acessar o arquivo direto ou enviar vazio, volta pro chat
    header("Location: chat.php");
    exit;
}
?>