// =============================================
// DARK MODE
// =============================================
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    const ico = document.getElementById('themeIco');
    if (ico) ico.className = document.body.classList.contains('dark-mode') ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
}

// =============================================
// VALIDAÇÃO E EVENTOS GERAIS
// =============================================
window.addEventListener('DOMContentLoaded', () => {
    // 1. Dark Mode
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
        const checkbox = document.getElementById('checkbox');
        if (checkbox) checkbox.checked = true;
        const ico = document.getElementById('themeIco');
        if (ico) ico.className = 'fa-solid fa-sun';
    }

    // 2. Validações
    if (document.getElementById('form-login')) {
        iniciarValidacaoLogin();
    }

    // Corrigido: Agora aceita 'salvar', 'processa' ou 'atualizar'
    if (document.querySelector('form[action*="usuarios/salvar"], form[action*="usuarios/processa"], form[action*="usuarios/atualizar"]')) {
        iniciarValidacaoCadastro();
    }

    // 3. Carrossel
    const textItems = document.querySelectorAll('.carousel-item');
    const imgItems  = document.querySelectorAll('.c-img');
    if (textItems.length > 0 && imgItems.length > 0) {
        let currentIndex = 0;
        setInterval(() => {
            textItems[currentIndex].classList.remove('active');
            imgItems[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % textItems.length;
            textItems[currentIndex].classList.add('active');
            imgItems[currentIndex].classList.add('active');
        }, 4000);
    }
});

// =============================================
// FUNÇÕES DE SENHA
// =============================================
function toggleSenhaVisibilidade(inputId, btnId) {
    const input = document.getElementById(inputId);
    const btn = document.getElementById(btnId);
    if (!input || !btn) return;
    
    if (input.type === "password") {
        input.type = "text";
        btn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        input.type = "password";
        btn.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}

// =============================================
// VALIDAÇÃO PROATIVA DA SENHA
// =============================================
function iniciarValidacaoCadastro() {
    const senha = document.getElementById('senha');
    if (!senha) return;

    senha.addEventListener('focus', () => {
        const container = document.getElementById('senha-regras');
        if (container) container.style.display = 'block';
    });

    senha.addEventListener('input', function() {
        const val = this.value;
        const temMin = val.length >= 6;
        const temMai = /[A-Z]/.test(val);
        const temNum = /[0-9]/.test(val);

        atualizarRegra('req-min', temMin);
        atualizarRegra('req-mai', temMai);
        atualizarRegra('req-num', temNum);
    });
}

function atualizarRegra(id, valido) {
    const el = document.getElementById(id);
    if (el) {
        el.className = valido ? 'valido' : 'invalido';
    }
}

// =============================================
// UTILITÁRIOS (LOGIN E OUTROS)
// =============================================
function mostrarErro(inputId, mensagem) {
    const input = document.getElementById(inputId);
    if (!input) return;
    input.style.borderColor = '#e74c3c';
    let erro = document.getElementById('erro-' + inputId);
    if (!erro) {
        erro = document.createElement('small');
        erro.id = 'erro-' + inputId;
        erro.style.color = '#e74c3c';
        erro.style.display = 'block';
        input.parentNode.appendChild(erro);
    }
    erro.textContent = mensagem;
}

function limparErro(inputId) {
    const input = document.getElementById(inputId);
    if (!input) return;
    input.style.borderColor = '';
    const erro = document.getElementById('erro-' + inputId);
    if (erro) erro.textContent = '';
}

function iniciarValidacaoLogin() {
    const form = document.getElementById('form-login');
    const email = document.getElementById('email');
    const senha = document.getElementById('senha');
    if (email) email.addEventListener('input', () => limparErro('email'));
    if (senha) senha.addEventListener('input', () => limparErro('senha'));
    
    form.addEventListener('submit', function (e) {
        if (!email.value || !senha.value) {
            e.preventDefault();
            mostrarErro('email', 'Preencha todos os campos.');
        }
    });
}

// =============================================
// SIDEBAR E ACESSIBILIDADE
// =============================================
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        sidebar.classList.toggle('open');
        document.getElementById('sidebarOverlay')?.classList.toggle('active');
        document.getElementById('hamburgerBtn')?.classList.toggle('open');
    }
}

function toggleAcessibilidade() {
    const menu = document.getElementById('menuAcessibilidade');
    if (menu) menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

let tamanhoFonteAtual = 100;
function ajustarFonte(acao) {
    if (acao === 'aumentar' && tamanhoFonteAtual < 150) tamanhoFonteAtual += 10;
    if (acao === 'diminuir' && tamanhoFonteAtual > 80) tamanhoFonteAtual -= 10;
    document.documentElement.style.fontSize = tamanhoFonteAtual + '%';
}

let leituraAtiva = false;
function toggleLeitorVoz() {
    if (leituraAtiva) {
        window.speechSynthesis.cancel();
        leituraAtiva = false;
    } else {
        const texto = document.querySelector('.main-content')?.innerText || document.body.innerText;
        const msg = new SpeechSynthesisUtterance(texto);
        msg.lang = 'pt-BR';
        window.speechSynthesis.speak(msg);
        leituraAtiva = true;
    }
}