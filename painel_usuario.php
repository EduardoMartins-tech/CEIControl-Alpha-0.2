<?php
session_start();
echo "Bem-vindo, " . $_SESSION['usuario'] . " (Perfil: " . $_SESSION['perfil'] . ")";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Painel Usuário</title>
</head>

<body>

    <h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?> (Usuário)</h2>
    <p><a href="logout.php">Sair</a></p>

    <!-- ainda não tenho um cadastro bem definido -->

</body>

</html>