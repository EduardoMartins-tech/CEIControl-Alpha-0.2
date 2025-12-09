<?php
session_start();
include('database.php');

$email = $_POST['email'];
$senha = $_POST['senha'];
$perfil = $_POST['perfil'];

$sql = "SELECT * FROM usuarios WHERE email = ? AND perfil = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $perfil);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if ($senha === $usuario['senha']) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['perfil'] = $usuario['perfil'];

        switch ($usuario['perfil']) {
            case 'admin':
                header("Location: painel_admin.php");
                break;
            case 'cliente':
                header("Location: painel_cliente.php");
                break;
            case 'usuario':
                header("Location: painel_usuario.php");
                break;
        }
        exit;
    }
}


header("Location: form_login.php?erro=1");
exit;
?>