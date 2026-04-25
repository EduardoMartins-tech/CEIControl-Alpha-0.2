<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;

if (is_file($file)) {
    return false;
}

$phpFile = $file . '.php';
if (is_file($phpFile)) {
    require $phpFile;
    exit;
}

$indexFile = rtrim($file, '/') . '/index.php';
if (is_file($indexFile)) {
    require $indexFile;
    exit;
}

http_response_code(404);
echo "404 Not Found";
