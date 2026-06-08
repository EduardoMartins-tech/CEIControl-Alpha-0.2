<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || 
            (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') 
            ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
define('BASE_URL', $protocol . $host . '/');

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// =========================================================================
// BLINDAGEM PARA O RAILWAY
// =========================================================================

if (strpos($path, 'public/') === 0) {
    $path = substr($path, 7);
}

// Procura o arquivo forçadamente dentro da pasta public/
$file = __DIR__ . '/public/' . $path;

if ($path !== '' && is_file($file)) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $mimes = [
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'svg'  => 'image/svg+xml'
    ];
    if (isset($mimes[$ext])) {
        header('Content-Type: ' . $mimes[$ext]);
    }
    
    header("Cache-Control: max-age=2592000, public");
    
    readfile($file);
    exit;
}
// =========================================================================

// ROTAS DO SISTEMA
$routes = [
    ''                          => 'app/views/home.php',
    'index.php'                 => 'app/views/home.php',
    'login'                     => 'app/views/auth/form_login.php',
    'login/user'                => 'app/views/auth/login_user.php',
    'logout'                    => 'app/views/auth/logout.php',
    'painel/admin'              => 'app/views/auth/painel_admin.php',
    'painel/usuario'            => 'app/views/auth/painel_usuario.php',
    'painel/cliente'            => 'app/views/auth/painel_cliente.php',
    'acesso/admin'              => 'app/views/auth/acesso_admin.php',

    'usuarios'                  => 'app/views/usuarios/listar.php',
    'usuarios/cadastro'         => 'app/views/usuarios/form_cadastro.php',
    'usuarios/processa'         => 'app/views/usuarios/processa_cadastro.php',
    'usuarios/editar'           => 'app/views/usuarios/editar.php',
    'usuarios/atualizar'        => 'app/views/usuarios/atualizar.php',
    'usuarios/excluir'          => 'app/views/usuarios/excluir.php',

    'produtos'                  => 'app/views/produtos/listar.php',
    'produtos/cadastro'         => 'app/views/produtos/form_cadastro.php',
    'produtos/processa'         => 'app/views/produtos/processa_cadastro.php',
    'produtos/editar'           => 'app/views/produtos/editar.php',
    'produtos/atualizar'        => 'app/views/produtos/atualizar.php',
    'produtos/excluir'          => 'app/views/produtos/excluir.php',

    'fornecedores'              => 'app/views/fornecedores/listar.php',
    'fornecedores/cadastro'     => 'app/views/fornecedores/form_cadastro.php',
    'fornecedores/processa'     => 'app/views/fornecedores/processa_cadastro.php',
    'fornecedores/editar'       => 'app/views/fornecedores/editar.php',
    'fornecedores/atualizar'    => 'app/views/fornecedores/atualizar.php',
    'fornecedores/excluir'      => 'app/views/fornecedores/excluir.php',

    'eventos'                   => 'app/views/eventos/listar.php',
    'eventos/cadastro'          => 'app/views/eventos/form_cadastro.php',
    'eventos/processa'          => 'app/views/eventos/processa_cadastro.php',
    'eventos/editar'            => 'app/views/eventos/editar.php',
    'eventos/atualizar'         => 'app/views/eventos/atualizar.php',
    'eventos/excluir'           => 'app/views/eventos/excluir.php',

    'comunicacao'               => 'app/views/comunicacao.php',
    'mensagens/enviar'          => 'app/views/enviar_mensagens.php',
    'sobre'                     => 'app/views/sobre.php',
];

if (isset($routes[$path])) {
    $target = __DIR__ . '/' . $routes[$path];
    if (file_exists($target)) {
        require $target;
        exit;
    }
}

if ($path === '' && file_exists(__DIR__ . '/public/index.php')) {
    require __DIR__ . '/public/index.php';
    exit;
}

http_response_code(404);
echo "<div style='text-align:center; padding: 50px; font-family: sans-serif;'>";
echo "<h1 style='color: #004d40;'>404 - Cadê a página?</h1>";
echo "<p>O CEIControl não encontrou a rota: <b>/" . htmlspecialchars($path) . "</b></p>";
echo "<a href='/' style='padding: 10px 20px; background: #00a98f; color: white; text-decoration: none; border-radius: 5px;'>Voltar ao Início</a>";
echo "</div>";
