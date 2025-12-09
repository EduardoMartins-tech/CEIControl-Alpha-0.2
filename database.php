<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ceicontrol"; // nome do banco que você criou

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>