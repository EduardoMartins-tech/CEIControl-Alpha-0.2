<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CEIControl</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>public/assets/ceicontrol.png">
    <script defer src="<?= BASE_URL ?>public/script.js"></script>
</head>
<body class="bg-auth">
    <div class="auth-split-wrapper">
        <div class="auth-side-form">
            <div class="auth-container">
                <div class="auth-header">
                    <a href="<?= BASE_URL ?>" class="logo-text">CEIControl®</a>
                </div>

                <div class="auth-card">
                    <h2>Entrar no Sistema</h2>
                    <p class="subtitle">Bem-vindo de volta! Insira os seus dados para aceder ao painel.</p>

                    <?php if (isset($_GET['erro'])): ?>
                        <div class="error-msg">
                            <i class="fa-solid fa-circle-exclamation"></i> E-mail ou senha incorretos!
                        </div>
                    <?php endif; ?>

                    <div id="js-error" style="
                        display:none;
                        background:#fee2e2;
                        color:#b91c1c;
                        border:1px solid #fca5a5;
                        border-radius:8px;
                        padding:10px 14px;
                        margin-bottom:16px;
                        font-size:0.9rem;
                    "></div>

                    <form action="<?= BASE_URL ?>login/user" method="POST" class="auth-form" id="form-login" novalidate>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="••••••••" required>
                        </div>

                        <button type="submit" class="btn-black-full" style="width:100%;justify-content:center;margin-top:10px;">
                            Entrar na plataforma
                        </button>
                    </form>
                </div>

                <div class="auth-footer">
                    <p>Problemas com o acesso?<br>
                    <a href="<?= BASE_URL ?>#contato">Contacte o suporte da JEMTech</a></p>
                </div>
            </div>
        </div>

        <div class="auth-side-visual">
            <div class="visual-content">
                <h2>Gestão inteligente para uma educação transformadora.</h2>
                <p>Centralize processos, economize tempo e foque no desenvolvimento dos seus alunos com a tecnologia da JEMTech.</p>
                <div class="visual-footer">
                    <img src="<?= BASE_URL ?>public/assets/logo_jemtech.png" alt="Logo JEMTech" class="footer-logo" style="filter:none;">
                    <img src="<?= BASE_URL ?>public/assets/logo_fatec.jpg" alt="Logo FATEC" class="footer-logo" style="filter:none;border-radius:5px;">
                    <span class="footer-text">Powered by JEMTech & FATEC</span>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('form-login').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value.trim();
        const senha = document.getElementById('senha').value.trim();
        const erro  = document.getElementById('js-error');

        erro.style.display = 'none';
        erro.textContent   = '';

        if (!email || !senha) {
            e.preventDefault();
            erro.textContent   = 'Preencha o e-mail e a senha antes de continuar.';
            erro.style.display = 'block';
        }
    });
    </script>
</body>
</html>
