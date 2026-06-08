// =============================================
// DARK MODE
// =============================================
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    const ico = document.getElementById('themeIco');
    if (ico) ico.className = document.body.classList.contains('dark-mode') ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
}

window.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
        const checkbox = document.getElementById('checkbox');
        if (checkbox) checkbox.checked = true;
        const ico = document.getElementById('themeIco');
        if (ico) ico.className = 'fa-solid fa-sun';
    }

    if (document.getElementById('form-login')) {
        iniciarValidacaoLogin();
    }

    if (document.querySelector('form[action*="usuarios/processa"]')) {
        iniciarValidacaoCadastro();
    }
});


// =============================================
// UTILITÁRIOS
// =============================================
function mostrarErro(inputId, mensagem) {
    const input = document.getElementById(inputId);
    if (!input) return;
    let erro = document.getElementById('erro-' + inputId);

    input.style.borderColor = '#e74c3c';

    if (!erro) {
        erro = document.createElement('small');
        erro.id = 'erro-' + inputId;
        erro.style.color = '#e74c3c';
        erro.style.display = 'block';
        erro.style.marginTop = '4px';
        erro.style.fontSize = '0.8rem';
        input.parentNode.appendChild(erro);
    }
    erro.textContent = mensagem;
}

function limparErro(inputId) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const erro = document.getElementById('erro-' + inputId);
    input.style.borderColor = '';
    if (erro) erro.textContent = '';
}

function validarEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}


// =============================================
// VALIDAÇÃO DO LOGIN
// =============================================
function iniciarValidacaoLogin() {
    const form = document.getElementById('form-login');

    const email = document.getElementById('email');
    const senha = document.getElementById('senha');

    if (email) email.addEventListener('input', () => limparErro('email'));
    if (senha) senha.addEventListener('input', () => limparErro('senha'));

    form.addEventListener('submit', function (e) {
        let valido = true;

        const emailVal = email ? email.value.trim() : '';
        const senhaVal = senha ? senha.value.trim() : '';

        if (!emailVal) {
            mostrarErro('email', 'O e-mail é obrigatório.');
            valido = false;
        } else if (!validarEmail(emailVal)) {
            mostrarErro('email', 'Digite um e-mail válido (ex: nome@email.com).');
            valido = false;
        } else {
            limparErro('email');
        }

        if (!senhaVal) {
            mostrarErro('senha', 'A senha é obrigatória.');
            valido = false;
        } else if (senhaVal.length < 6) {
            mostrarErro('senha', 'A senha deve ter pelo menos 6 caracteres.');
            valido = false;
        } else {
            limparErro('senha');
        }

        if (!valido) e.preventDefault();
    });
}


// =============================================
// VALIDAÇÃO DO CADASTRO DE USUÁRIO
// =============================================
function iniciarValidacaoCadastro() {
    const form = document.querySelector('form[action*="usuarios/processa"]');

    const nome  = document.getElementById('nome');
    const email = document.getElementById('email');
    const senha = document.getElementById('senha');

    if (nome)  nome.addEventListener('input',  () => limparErro('nome'));
    if (email) email.addEventListener('input', () => limparErro('email'));
    if (senha) senha.addEventListener('input', () => limparErro('senha'));

    form.addEventListener('submit', function (e) {
        let valido = true;

        const nomeVal  = nome  ? nome.value.trim()  : '';
        const emailVal = email ? email.value.trim()  : '';
        const senhaVal = senha ? senha.value.trim()  : '';

        if (!nomeVal) {
            mostrarErro('nome', 'O nome completo é obrigatório.');
            valido = false;
        } else if (nomeVal.length < 3) {
            mostrarErro('nome', 'O nome deve ter pelo menos 3 caracteres.');
            valido = false;
        } else {
            limparErro('nome');
        }

        if (!emailVal) {
            mostrarErro('email', 'O e-mail é obrigatório.');
            valido = false;
        } else if (!validarEmail(emailVal)) {
            mostrarErro('email', 'Digite um e-mail válido (ex: nome@email.com).');
            valido = false;
        } else {
            limparErro('email');
        }

        if (!senhaVal) {
            mostrarErro('senha', 'A senha é obrigatória.');
            valido = false;
        } else if (senhaVal.length < 6) {
            mostrarErro('senha', 'A senha deve ter pelo menos 6 caracteres.');
            valido = false;
        } else if (!/[A-Z]/.test(senhaVal)) {
            mostrarErro('senha', 'A senha deve ter pelo menos uma letra maiúscula.');
            valido = false;
        } else if (!/[0-9]/.test(senhaVal)) {
            mostrarErro('senha', 'A senha deve ter pelo menos um número.');
            valido = false;
        } else {
            limparErro('senha');
        }

        if (!valido) e.preventDefault();
    });
}


// =============================================
// SIDEBAR MOBILE — HAMBURGUER
// =============================================
function toggleSidebar() {
    const sidebar      = document.getElementById('sidebar');
    const overlay      = document.getElementById('sidebarOverlay');
    const hamburgerBtn = document.getElementById('hamburgerBtn');

    if (!sidebar) return;

    sidebar.classList.toggle('open');
    if (overlay) overlay.classList.toggle('active');
    if (hamburgerBtn) hamburgerBtn.classList.toggle('open');

    document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
}


// =============================================
// MOTOR DO CARROSSEL (dashboard legado)
// =============================================
document.addEventListener('DOMContentLoaded', () => {
    const textItems = document.querySelectorAll('.carousel-item');
    const imgItems  = document.querySelectorAll('.c-img');

    if (textItems.length === 0 || imgItems.length === 0) return;

    let currentIndex = 0;
    const totalItems = textItems.length;

    setInterval(() => {
        textItems[currentIndex].classList.remove('active');
        imgItems[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalItems;
        textItems[currentIndex].classList.add('active');
        imgItems[currentIndex].classList.add('active');
    }, 4000);
});


// =============================================
// CEIControl — MOTOR DE ACESSIBILIDADE
// =============================================
function toggleAcessibilidade() {
    const menu = document.getElementById('menuAcessibilidade');
    if (!menu) return;
    const aberto = menu.style.display === 'flex';
    menu.style.display = aberto ? 'none' : 'flex';
}

let tamanhoFonteAtual = 100;
function ajustarFonte(acao) {
    if (acao === 'aumentar' && tamanhoFonteAtual < 150) tamanhoFonteAtual += 10;
    if (acao === 'diminuir' && tamanhoFonteAtual > 80)  tamanhoFonteAtual -= 10;
    document.documentElement.style.fontSize = tamanhoFonteAtual + '%';
}

let sintetizador = window.speechSynthesis;
let leituraAtiva = false;

function toggleLeitorVoz() {
    if (leituraAtiva) {
        sintetizador.cancel();
        leituraAtiva = false;
        alert('Leitor de tela desativado.');
    } else {
        const alvo  = document.querySelector('.main-content') || document.body;
        const texto = alvo.innerText;
        const msg   = new SpeechSynthesisUtterance(texto);
        msg.lang = 'pt-BR';
        msg.rate = 1.2;
        sintetizador.speak(msg);
        leituraAtiva = true;
        alert('Leitor de tela ativado!');
    }
}
