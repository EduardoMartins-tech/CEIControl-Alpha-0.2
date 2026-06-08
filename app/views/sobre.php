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
    <title>Sobre Nós | CEIControl</title>
    
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
                    <li><a href="<?= BASE_URL ?>">Início</a></li>
                    <li><a href="<?= BASE_URL ?>#funcionalidades">Funcionalidades</a></li>
                    <li><a href="<?= BASE_URL ?>sobre" class="active">Sobre</a></li>
                    <li><a href="<?= BASE_URL ?>#contato">Contato</a></li>
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
        <section class="hero-sobre">
            <div class="hero-orb"></div>
            <h1>Sobre a JEMTech</h1>
            <p>Uma startup de impacto social focada no desenvolvimento de soluções digitais exclusivas para democratizar o acesso à tecnologia na gestão pública.</p>
        </section>

        <section class="section-box">
            <div class="reveal">
                <h2 class="sec-h2">O Projeto CEIControl</h2>
                <p class="sec-p">Desenvolvido para modernizar e simplificar a gestão de Centros de Educação Infantil públicos. Nossa plataforma centraliza processos administrativos e pedagógicos em um único ambiente.</p>

                <div class="slider-wrapper">
                    <button class="slider-btn left" id="prevBtnSobre"><i class="fa-solid fa-chevron-left"></i></button>
                    
                    <div class="slider-viewport">
                        <div class="slider-track" id="trackSobre">
                            <div class="module-card">
                                <div class="module-icon"><i class="fa-solid fa-users-gear"></i></div>
                                <h4>Gestão de Usuários</h4>
                                <p>Controle de acesso seguro e granular por perfis hierárquicos (Coordenador, Professor, Responsável).</p>
                            </div>
                            <div class="module-card">
                                <div class="module-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                <h4>Estoque e Serviços</h4>
                                <p>Gestão completa de insumos, equipamentos e solicitações de manutenção das instalações.</p>
                            </div>
                            <div class="module-card">
                                <div class="module-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                <h4>Fornecedores</h4>
                                <p>Centralização de contatos, contratos e histórico de entregas de fornecedores homologados.</p>
                            </div>
                            <div class="module-card">
                                <div class="module-icon"><i class="fa-solid fa-calendar-check"></i></div>
                                <h4>Agenda Digital</h4>
                                <p>Planejamento de eventos, reuniões, cardápios e rotinas pedagógicas integradas.</p>
                            </div>
                            <div class="module-card">
                                <div class="module-icon"><i class="fa-solid fa-comments"></i></div>
                                <h4>Chat Interno</h4>
                                <p>Comunicação segura e em tempo real entre a coordenação e os educadores.</p>
                            </div>
                        </div>
                    </div>

                    <button class="slider-btn right" id="nextBtnSobre"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </section>

        <section class="section-alt">
            <div class="reveal">
                <h2 class="sec-h2">Nossos Objetivos</h2>
                <ul class="obj-list">
                    <li><i class="fa-solid fa-circle-check"></i> Criar uma plataforma gratuita, eficiente e acessível para gestão pública.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Centralizar dados administrativos reduzindo o uso de papel.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Melhorar a comunicação entre coordenação, educadores e responsáveis.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Garantir a segurança da informação com controle de acesso rigoroso.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Utilizar arquitetura MVC garantindo escalabilidade técnica.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Promover a inclusão digital dentro do ambiente escolar público.</li>
                </ul>
            </div>
        </section>

        <section class="section-box">
            <div class="reveal">
                <div class="feats-grid">
                    <div class="feat-card">
                        <div class="feat-ico"><i class="fa-solid fa-bullseye"></i></div>
                        <h3>Nossa Missão</h3>
                        <p>Democratizar o acesso à tecnologia de gestão, fornecendo plataformas gratuitas e robustas para a gestão pública escolar.</p>
                    </div>
                    <div class="feat-card">
                        <div class="feat-ico"><i class="fa-solid fa-eye"></i></div>
                        <h3>Nossa Visão</h3>
                        <p>Ser a principal referência em inovação para o setor público, conectando tecnologia e educação de forma humana e eficiente.</p>
                    </div>
                    <div class="feat-card">
                        <div class="feat-ico"><i class="fa-solid fa-gem"></i></div>
                        <h3>Nossos Valores</h3>
                        <p>Inovação para simplificar rotinas, transparência, segurança criptográfica de dados e profundo impacto social e ambiental.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-alt">
            <div class="reveal">
                <h2 class="sec-h2">Equipe de Desenvolvimento</h2>
                <p class="sec-p" style="margin-bottom: 20px;">Conheça os desenvolvedores responsáveis por dar vida ao ecossistema CEIControl.</p>
                
                <div class="team-grid">
                    <div class="team-member">
                        <img src="https://github.com/EduardoMartins-tech.png" alt="Eduardo Ferreira Martins">
                        <h4 style="font-size: 1.2rem; color: var(--text-main); margin-bottom: 5px;">Eduardo F. Martins</h4>
                        <p style="color: var(--primary-green); font-size: 0.9rem; font-weight: 600;">Desenvolvedor / Eng. de Software</p>
                    </div>
                    <div class="team-member">
                        <img src="https://github.com/JVCod1ng.png" alt="João Vitor Martins">
                        <h4 style="font-size: 1.2rem; color: var(--text-main); margin-bottom: 5px;">João Vitor Martins</h4>
                        <p style="color: var(--primary-green); font-size: 0.9rem; font-weight: 600;">Desenvolvedor / Designer de UI</p>
                    </div>
                </div>

                <div class="advisors-box">
                    <h4 style="font-size: 1.2rem; color: var(--text-main); margin-bottom: 10px;"><i class="fa-solid fa-graduation-cap" style="color: var(--primary-green); margin-right: 8px;"></i> Orientação Acadêmica FATEC</h4>
                    <p style="color: var(--text-sub); font-size: 0.95rem; margin-bottom: 5px;"><strong>Prof. Jefferson Roberto de Lima</strong> — Disciplina de Projeto Integrador III</p>
                    <p style="color: var(--text-sub); font-size: 0.95rem;"><strong>Prof. Francisco Douglas Lima Abreu</strong> — Disciplina de PI II & Programação WEB</p>
                </div>
            </div>
        </section>

        <section class="section-box" style="padding-bottom: 120px;">
            <div class="reveal">
                <h2 class="sec-h2">Compromisso Sustentável (ODS)</h2>
                <p class="sec-p">Alinhados com os Objetivos de Desenvolvimento Sustentável da ONU.</p>
                
                <div class="feats-grid">
                    <div class="feat-card ods-card">
                        <img src="<?= BASE_URL ?>public/assets/ods4.png" alt="ODS 4" class="ods-img">
                        <div class="ods-content">
                            <h3>ODS 4 - Educação</h3>
                            <p>Melhorar a infraestrutura de comunicação e otimizar as rotinas das creches públicas.</p>
                        </div>
                    </div>
                    <div class="feat-card ods-card">
                        <img src="<?= BASE_URL ?>public/assets/ods9.png" alt="ODS 9" class="ods-img">
                        <div class="ods-content">
                            <h3>ODS 9 - Inovação</h3>
                            <p>Promover a modernização e a digitalização de processos burocráticos governamentais.</p>
                        </div>
                    </div>
                    <div class="feat-card ods-card">
                        <img src="<?= BASE_URL ?>public/assets/ods10.jpg" alt="ODS 10" class="ods-img">
                        <div class="ods-content">
                            <h3>ODS 10 - Desigualdades</h3>
                            <p>Oferecer uma solução robusta e 100% gratuita para reduzir a exclusão digital.</p>
                        </div>
                    </div>
                    <div class="feat-card ods-card">
                        <img src="<?= BASE_URL ?>public/assets/ods17.png" alt="ODS 17" class="ods-img">
                        <div class="ods-content">
                            <h3>ODS 17 - Parcerias</h3>
                            <p>Viabilizar a integração entre prefeituras, secretarias e toda a comunidade escolar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div style="position: fixed; bottom: 2rem; right: 2rem; z-index: 9999; display: flex; flex-direction: column; align-items: flex-end; gap: .5rem;">
        <div id="menuAcessibilidade" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px; padding: 1rem; box-shadow: var(--shadow-md); display: none; flex-direction: column; gap: .45rem; min-width: 195px;">
            <p style="font-size: .82rem; font-weight: 600; color: var(--text-main); text-align: center; padding-bottom: .3rem; border-bottom: 1px solid var(--border-color);">Acessibilidade</p>
            <button onclick="ajustarFonte('aumentar')" style="padding: .52rem .9rem; background: var(--bg-body); border: 1px solid var(--border-color); border-radius: 8px; color: var(--text-main); font-weight: 600; font-size: .8rem; cursor: pointer; display: flex; align-items: center; gap: .5rem;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-plus"></i> Aumentar Letra</button>
            <button onclick="ajustarFonte('diminuir')" style="padding: .52rem .9rem; background: var(--bg-body); border: 1px solid var(--border-color); border-radius: 8px; color: var(--text-main); font-weight: 600; font-size: .8rem; cursor: pointer; display: flex; align-items: center; gap: .5rem;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-minus"></i> Diminuir Letra</button>
            <button onclick="toggleLeitorVoz()" style="padding: .52rem .9rem; background: var(--bg-body); border: 1px solid var(--border-color); border-radius: 8px; color: var(--text-main); font-weight: 600; font-size: .8rem; cursor: pointer; display: flex; align-items: center; gap: .5rem;"><i class="fa-solid fa-volume-high"></i> Leitor de Tela</button>
        </div>
        <button onclick="toggleAcessibilidade()" aria-label="Menu de Acessibilidade" style="width: 48px; height: 48px; border-radius: 50%; background: var(--primary-green); color: white; border: none; cursor: pointer; font-size: 1.1rem; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-sm);">
            <i class="fa-solid fa-universal-access"></i>
        </button>
    </div>

    <footer style="background: var(--bg-card); padding: 1.4rem 2rem; text-align: center; border-top: 1px solid var(--border-color);">
        <p style="color: var(--text-sub); font-size: .9rem;">© 2026 JEMTech | Desenvolvido para a FATEC Ferraz de Vasconcelos</p>
    </footer>

    <script src="<?= BASE_URL ?>public/script.js"></script>
    <script>
        // Navbar shadow effect on scroll
        const mainNav = document.getElementById('mainNav');
        addEventListener('scroll', () => mainNav.classList.toggle('scrolled', scrollY > 20));

        // Scroll reveal animation trigger
        const revealObs = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => { if (e.isIntersecting) setTimeout(() => e.target.classList.add('in'), i * 110); });
        }, { threshold: .1 });
        document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

        // Lógica do Carrossel de Módulos (Mantida)
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('trackSobre');
            const slides = document.querySelectorAll('#trackSobre .module-card');
            const nextBtn = document.getElementById('nextBtnSobre');
            const prevBtn = document.getElementById('prevBtnSobre');

            if (!track || slides.length === 0) return;

            let currentIndex = 0;
            const totalSlides = slides.length;

            function updateSlider(index) {
                if (index >= totalSlides) index = 0;
                if (index < 0) index = totalSlides - 1;
                currentIndex = index;
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
            }

            nextBtn.addEventListener('click', () => updateSlider(currentIndex + 1));
            prevBtn.addEventListener('click', () => updateSlider(currentIndex - 1));
        });
    </script>
</body>
</html>
