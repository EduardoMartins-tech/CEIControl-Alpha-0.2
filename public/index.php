<?php
session_start();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$diretorio = dirname($_SERVER['SCRIPT_NAME']);
$diretorio = rtrim(str_replace('\\', '/', $diretorio), '/') . '/';
define('BASE_URL', $protocol . $host . $diretorio);

require_once '../router.php';
