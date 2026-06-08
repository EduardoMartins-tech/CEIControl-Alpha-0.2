<?php
/**
 * ============================================================================
 * CEIControl - COMPONENTE DE NAVEGAÇÃO LATERAL (SIDEBAR)
 * ============================================================================
 * Este arquivo renderiza o menu de navegação adaptativo com base no perfil de
 * acesso do usuário autenticado na sessão ($_SESSION['perfil']).
 *
 * Desenvolvido por: JEMTech (Eduardo F. Martins & João Vitor Martins)
 * Disciplina: Projeto Integrador III - FATEC Ferraz de Vasconcelos
 * Versão: Alpha 0.4 (MVC & Deploy Production Mode)
 * @package app/views/partials
 * @author JEMTech <suporte@jemtech.com>
 */

if (!isset($pagina_atual)) {
    $pagina_atual = 'dashboard';
}
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <span class="logo-text">CEIControl®</span>
        <button class="sidebar-close-btn" onclick="toggleSidebar()" aria-label="Fechar Menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    
    <nav class="sidebar-nav">
        <p class="nav-category">Principal</p>
        
        <?php 
        /**
         * --------------------------------------------------------------------
         * VISÃO: ADMINISTRADOR (GESTÃO TOTAL DO SISTEMA)
         * --------------------------------------------------------------------
         */
        if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'admin'): 
        ?>
            <a href="<?= BASE_URL ?>painel/admin" class="<?= ($pagina_atual == 'dashboard') ? 'active' : '' ?>">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>
            
            <p class="nav-category">Gestão Administrativa</p>
            
            <a href="<?= BASE_URL ?>usuarios" class="<?= ($pagina_atual == 'usuarios') ? 'active' : '' ?>">
                <i class="fa-solid fa-users"></i> Usuários
            </a>
            
            <a href="<?= BASE_URL ?>produtos" class="<?= ($pagina_atual == 'estoque') ? 'active' : '' ?>">
                <i class="fa-solid fa-box-open"></i> Produtos
            </a>
            
            <a href="<?= BASE_URL ?>fornecedores" class="<?= ($pagina_atual == 'fornecedores') ? 'active' : '' ?>">
                <i class="fa-solid fa-truck-moving"></i> Fornecedores
            </a>
            
            <a href="<?= BASE_URL ?>eventos" class="<?= ($pagina_atual == 'agenda') ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-days"></i> Agenda
            </a>

        <?php 
        /**
         * --------------------------------------------------------------------
         * VISÃO: USUÁRIO (EDUCADORES / PROFESSORES)
         * --------------------------------------------------------------------
         */
        elseif (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'usuario'): 
        ?>
            <a href="<?= BASE_URL ?>painel/usuario" class="<?= ($pagina_atual == 'dashboard') ? 'active' : '' ?>">
                <i class="fa-solid fa-chalkboard-user"></i> Minha Sala
            </a>
            
            <p class="nav-category">Rotina Pedagógica</p>
            
            <a href="<?= BASE_URL ?>eventos" class="<?= ($pagina_atual == 'agenda') ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-check"></i> Agenda Escolar
            </a>
            
            <a href="<?= BASE_URL ?>produtos" class="<?= ($pagina_atual == 'estoque') ? 'active' : '' ?>">
                <i class="fa-solid fa-box-archive"></i> Materiais
            </a>

        <?php 
        /**
         * --------------------------------------------------------------------
         * VISÃO: CLIENTE (PAIS OU RESPONSÁVEIS DOS ALUNOS)
         * --------------------------------------------------------------------
         */
        elseif (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'cliente'): 
        ?>
            <a href="<?= BASE_URL ?>painel/cliente" class="<?= ($pagina_atual == 'dashboard') ? 'active' : '' ?>">
                <i class="fa-solid fa-house-user"></i> Visão Geral
            </a>
            
            <p class="nav-category">Acompanhamento Familiar</p>
            
            <a href="<?= BASE_URL ?>eventos" class="<?= ($pagina_atual == 'agenda') ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-day"></i> Agenda da CEI
            </a>
        <?php endif; ?>

        <?php
        /**
         * --------------------------------------------------------------------
         * SEÇÃO GLOBAL DO SISTEMA E DARK MODE
         * --------------------------------------------------------------------
         */
        ?>
        <p class="nav-category">Utilitários do Sistema</p>
        
        <a href="<?= BASE_URL ?>comunicacao" class="<?= ($pagina_atual == 'comunicacao') ? 'active' : '' ?>">
            <i class="fa-solid fa-comments"></i>
            <span>Comunicação</span>
        </a>
        
        <a href="<?= BASE_URL ?>logout" class="logout-link">
            <i class="fa-solid fa-right-from-bracket"></i> Sair
        </a>
    </nav>

    <!-- Interruptor de Dark Mode nativo da Sidebar -->
    <div class="theme-switch-wrapper">
        <i class="fa-solid fa-sun theme-icon-sm"></i>
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" onclick="toggleDarkMode()" />
            <div class="slider round"></div>
        </label>
        <i class="fa-solid fa-moon theme-icon-sm"></i>
    </div>
</aside> <!-- 🚨 ESTE É O CARA QUE IMPEDE O SEU PAINEL DE VIRAR UM CÓDIGO DE BARRAS! 🚨 -->

<!-- Topbar Adaptativo para Dispositivos Mobile -->
<div class="mobile-topbar">
    <span class="logo-text">CEIControl®</span>
    <button class="hamburger-btn" id="hamburgerBtn" onclick="toggleSidebar()">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>
</div>

<!-- Camada de Bloqueio de Fundo (Overlay) para Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- FAB ACESSIBILIDADE FLUTUANTE (Disponível em todas as telas do painel) -->
<div class="fab-acessibilidade">
    <div class="menu-acessibilidade" id="menuAcessibilidade">
        <p style="margin: 0; font-size: 0.9rem; font-weight: bold; color: var(--text-main); text-align: center; padding-bottom: 5px; border-bottom: 1px solid var(--border-color);">Acessibilidade</p>
        <button onclick="ajustarFonte('aumentar')" style="background: transparent; border: none; color: var(--text-main); padding: 5px 0; cursor: pointer; text-align: left; margin-top: 5px;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-plus"></i> Aumentar Letra</button>
        <button onclick="ajustarFonte('diminuir')" style="background: transparent; border: none; color: var(--text-main); padding: 5px 0; cursor: pointer; text-align: left;"><i class="fa-solid fa-a"></i><i class="fa-solid fa-minus"></i> Diminuir Letra</button>
        <button onclick="toggleLeitorVoz()" style="background: transparent; border: none; color: var(--text-main); padding: 5px 0; cursor: pointer; text-align: left;"><i class="fa-solid fa-volume-high"></i> Leitor de Tela</button>
    </div>
    <button class="fab-btn" onclick="toggleAcessibilidade()" aria-label="Menu de Acessibilidade">
        <i class="fa-solid fa-universal-access"></i>
    </button>
</div>

<!-- Script Principal -->
<script src="<?= BASE_URL ?>public/script.js"></script>
