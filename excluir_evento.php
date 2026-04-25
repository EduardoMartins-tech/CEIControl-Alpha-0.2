<?php
session_start();
include('database.php');

// Proteção: Só Admin pode excluir
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: form_login.php");
    exit;
}

if (isset($_GET['id'])) {
    // Como no listar_eventos passamos o título (URL encoded), pegamos ele aqui
    $identificador = $_GET['id'];

    // IMPORTANTE: Se você seguiu meu conselho e criou a coluna 'id' no banco, 
    // mantenha "WHERE id = ?". Se NÃO criou, use "WHERE titulo = ?"
    
    $sql = "DELETE FROM agenda WHERE titulo = ?"; 
    $stmt = $conn->prepare($sql);
    
    // Mudamos para "s" porque o título é uma String
    $stmt->bind_param("s", $identificador);

    if ($stmt->execute()) {
        header("Location: listar_eventos.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

} else {
    echo "Identificador inválido.";
}
?>