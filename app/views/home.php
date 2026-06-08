<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEIControl — Sistema de Gestão CEI</title>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>public/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>public/assets/ceicontrol.png">
    
</head>
<body>

<header class="nav" id="mainNav">
    <div class="nav-wrap">
        <a href="<?= BASE_URL ?>" class="brand">
            <div class="brand-logo"><img src="<?= BASE_URL ?>public/assets/ceicontrol.png" alt="CEIControl"></div>
            <div>
                <span class="brand-name">CEIControl</span>
                <span class="brand-sub">Sistema de Gestão CEI</span>
            </div>
        </a>

        <nav>
            <ul class="nav-links">
                <li><a href="<?= BASE_URL ?>" class="active">Início</a></li>
                <li><a href="#funcionalidades">Funcionalidades</a></li>
                <li><a href="<?= BASE_URL ?>sobre">Sobre</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>

        <div class="nav-end">
            <button class="icon-btn" onclick="toggleDarkMode()" aria-label="Alternar tema">
                <i id="themeIco" class="fa-solid fa-moon"></i>
            </button>
            <a href="<?= BASE_URL ?>login" class="btn-primary">Acessar Painel</a>
        </div>
    </div>
</header>

<main>
    <section class="hero">
        <div class="hero-orb-1"></div>
        <div class="hero-orb-2"></div>
        <div class="hero-grid">

            <div class="hero-left">
                <div class="hero-badge">
                    <span class="ping"></span>
                    Sistema de Gestão Escolar
                </div>

                <div class="hero-carousel" id="carouselText">
                    <div class="hslide on">
                        <h1>Simplifique a <em>Gestão</em> da Sua CEI Pública</h1>
                        <p>A solução integrada que centraliza fornecedores, agendas e comunicação com os pais.</p>
                    </div>
                    <div class="hslide">
                        <h1>Comunicação <em>Direta</em> e Segura</h1>
                        <p>Conecte a coordenação pedagógica aos responsáveis em tempo real via chat.</p>
                    </div>
                    <div class="hslide">
                        <h1>Controle Total de <em>Recursos</em></h1>
                        <p>Gerencie estoques, produtos e fornecedores de forma digital e eficiente.</p>
                    </div>
                </div>

                <div class="c-dots" id="cDots">
                    <button class="c-dot on" data-i="0"></button>
                    <button class="c-dot" data-i="1"></button>
                    <button class="c-dot" data-i="2"></button>
                </div>

                <div class="hero-ctas">
                    <a href="<?= BASE_URL ?>sobre" class="cta-main">
                        Saiba Mais <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#funcionalidades" class="cta-sec">
                        <i class="fa-solid fa-table-cells-large"></i> Funcionalidades
                    </a>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-imgcard" id="imgCard">
                    <img src="<?= BASE_URL ?>public/assets/image_8cc384.jpg" class="on" alt="CEIControl">
                    <img src="<?= BASE_URL ?>public/assets/image_8cca12.jpg" alt="CEIControl">
                    <img src="<?= BASE_URL ?>public/assets/istockphoto-998670532-2048x2048.jpg" alt="CEIControl">
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-n">100%</span>
                        <span class="stat-l">Digital</span>
                    </div>
                    <div class="stat">
                        <span class="stat-n">4+</span>
                        <span class="stat-l">Módulos</span>
                    </div>
                    <div class="stat">
                        <span class="stat-n">24/7</span>
                        <span class="stat-l">Acesso</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="funcionalidades" class="features">
        <div class="sec-header reveal">
            <span class="sec-tag">Funcionalidades</span>
            <h2 class="sec-h2">Nossas Funcionalidades Principais</h2>
            <p class="sec-p">Ferramentas pensadas para simplificar o dia a dia da sua instituição de ensino infantil.</p>
        </div>

        <div class="feats-grid">
            <div class="feat-card reveal">
                <div class="feat-ico"><i class="fa-solid fa-truck-fast"></i></div>
                <h3>Gestão de Fornecedores</h3>
                <p>Centralize contatos e informações estratégicas de todos os seus fornecedores.</p>
            </div>
            <div class="feat-card reveal">
                <div class="feat-ico"><i class="fa-solid fa-calendar-check"></i></div>
                <h3>Agenda Inteligente</h3>
                <p>Organize eventos, reuniões e rotinas escolares com um calendário integrado e intuitivo.</p>
            </div>
            <div class="feat-card reveal">
                <div class="feat-ico"><i class="fa-solid fa-comments"></i></div>
                <h3>Comunicação com Pais</h3>
                <p>Envie avisos e convites de forma rápida e fácil, mantendo os responsáveis sempre informados.</p>
            </div>
            <div class="feat-card reveal">
                <div class="feat-ico"><i class="fa-solid fa-boxes-stacked"></i></div>
                <h3>Integração Total</h3>
                <p>Consolide suas ferramentas em um único lugar, eliminando retrabalho e aumentando a eficiência.</p>
            </div>
        </div>
    </section>

    <section id="contato" class="contact">
        <div class="contact-inner">
            <div class="contact-lhs reveal">
                <h2>Chamada para Parceria</h2>
                <p>Gostaria de saber mais ou se tornar nosso parceiro? Entre em contato agora e descubra como o CEIControl pode transformar sua instituição.</p>
                <div class="perks">
                    <div class="perk"><i class="fa-solid fa-circle-check"></i> Implantação rápida e simples</div>
                    <div class="perk"><i class="fa-solid fa-circle-check"></i> Suporte dedicado</div>
                    <div class="perk"><i class="fa-solid fa-circle-check"></i> Sistema 100% web, sem instalação</div>
                </div>
            </div>

            <div class="contact-box reveal">
                <form>
                    <div class="fgroup">
                        <label>Nome completo</label>
                        <input type="text" class="finput" placeholder="Seu nome" required>
                    </div>
                    <div class="fgroup">
                        <label>E-mail institucional</label>
                        <input type="email" class="finput" placeholder="email@instituicao.gov.br" required>
                    </div>
                    <div class="fgroup">
                        <label>Mensagem</label>
                        <textarea class="finput" placeholder="Sua mensagem..." required></textarea>
                    </div>
                    <button type="submit" class="btn-send">
                        <i class="fa-solid fa-paper-plane"></i> Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<div style="position:fixed;bottom:2rem;right:2rem;z-index:9999;display:flex;flex-direction:column;align-items:flex-end;gap:.5rem;">
    <div id="menuAcessibilidade" style="background:var(--bg-card);border:1px solid var(--border-color);border-radius:12px;padding:1rem;box-shadow:var(--shadow-md);display:none;flex-direction:column;gap:.45rem;min-width:195px;">
        <p style="font-size:.82rem;font-weight:600;color:var(--text-main);text-align:center;padding-bottom:.3rem;border-bottom:1px solid var(--border-color);">Acessibilidade</p>
        <button onclick="ajustarFonte('aumentar')" style="padding:.52rem .9rem;background:var(--bg-body);border:1px solid var(--border-color);border-radius:8px;color:var(--text-main);font-weight:600;font-size:.8rem;cursor:pointer;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-plus"></i> Aumentar Letra</button>
        <button onclick="ajustarFonte('diminuir')" style="padding:.52rem .9rem;background:var(--bg-body);border:1px solid var(--border-color);border-radius:8px;color:var(--text-main);font-weight:600;font-size:.8rem;cursor:pointer;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-minus"></i> Diminuir Letra</button>
        <button onclick="toggleLeitorVoz()" style="padding:.52rem .9rem;background:var(--bg-body);border:1px solid var(--border-color);border-radius:8px;color:var(--text-main);font-weight:600;font-size:.8rem;cursor:pointer;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-volume-high"></i> Leitor de Tela</button>
    </div>
    <button onclick="toggleAcessibilidade()" aria-label="Menu de Acessibilidade" style="width:48px;height:48px;border-radius:50%;background:var(--primary-green);color:white;border:none;cursor:pointer;font-size:1.1rem;display:flex;align-items:center;justify-content:center;box-shadow:var(--shadow-sm);">
        <i class="fa-solid fa-universal-access"></i>
    </button>
</div>

<footer style="background:var(--bg-card);padding:1.4rem 2rem;text-align:center;border-top:1px solid var(--border-color);">
    <p style="color:var(--text-sub);font-size:.9rem;">© 2026 JEMTech | Desenvolvido para a FATEC Ferraz de Vasconcelos</p>
</footer>

<script src="<?= BASE_URL ?>public/script.js"></script>
<script>
    const mainNav = document.getElementById('mainNav');
    addEventListener('scroll', () => mainNav.classList.toggle('scrolled', scrollY > 20));

    let cur = 0;
    const slides = [...document.querySelectorAll('.hslide')];
    const imgs   = [...document.querySelectorAll('#imgCard img')];
    const dots   = [...document.querySelectorAll('.c-dot')];

    function goTo(n) {
        slides[cur].classList.remove('on');
        imgs[cur].classList.remove('on');
        dots[cur].classList.remove('on');
        cur = ((n % slides.length) + slides.length) % slides.length;
        slides[cur].classList.add('on');
        imgs[cur].classList.add('on');
        dots[cur].classList.add('on');
    }
    dots.forEach(d => d.addEventListener('click', () => goTo(+d.dataset.i)));
    setInterval(() => goTo(cur + 1), 5000);

    const revealObs = new IntersectionObserver((entries) => {
        entries.forEach((e, i) => { if (e.isIntersecting) setTimeout(() => e.target.classList.add('in'), i * 110); });
    }, { threshold: .1 });
    document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));
</script>
</body>
</html>
