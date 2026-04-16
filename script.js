let currentSlide = 0;
const textSlides = document.querySelectorAll('.carousel-item');
const imageSlides = document.querySelectorAll('.c-img');

function showSlide(index) {
    // Resetar todos
    textSlides.forEach(s => s.classList.remove('active'));
    imageSlides.forEach(img => img.classList.remove('active'));
    
    // Ativar o atual
    textSlides[index].classList.add('active');
    imageSlides[index].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % textSlides.length;
    showSlide(currentSlide);
}

// Trocar a cada 4 segundos para ficar dinâmico
setInterval(nextSlide, 4000);

// Função chamada pelo 'onclick' no seu HTML
function toggleDarkMode() {
    const body = document.body;
    const checkbox = document.getElementById('checkbox');
    
    // Adiciona ou remove a classe baseada no estado do checkbox
    if (checkbox.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
    } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    }
}

// Executa automaticamente ao carregar qualquer página para manter o tema salvo
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    const checkbox = document.getElementById('checkbox');
    const body = document.body;

    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        if (checkbox) {
            checkbox.checked = true; // Deixa a alavanca na posição 'on'
        }
    }
});