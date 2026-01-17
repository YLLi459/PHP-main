



function attachCardEvents() {
    const carCards = document.querySelectorAll('.car-card');
    carCards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
    });
}


document.addEventListener('DOMContentLoaded', loadCars);


function openModal(card) {
    const img = card.querySelector('img');
    const name = card.querySelector('h3').textContent;
    const description = card.querySelector('p').textContent;
    const rating = card.querySelector('.rating').textContent.replace('Rating: ', '');
    const specs = card.querySelector('.specs ul').innerHTML;
    
    document.getElementById('modal-image').src = img.src;
    document.getElementById('modal-name').textContent = name;
    document.getElementById('modal-description').textContent = description;
    document.getElementById('modal-rating').textContent = rating;
    document.getElementById('modal-specs').innerHTML = specs;
    modal.style.display = 'block';
}


const modal = document.getElementById('modal');
const closeModal = document.getElementById('close-modal');
closeModal.addEventListener('click', () => modal.style.display = 'none');
window.addEventListener('click', (e) => {
    if (e.target === modal) modal.style.display = 'none';
});


const searchInput = document.getElementById('search-input');
searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase();
    const carCards = document.querySelectorAll('.car-card');
    carCards.forEach(card => {
        const name = card.getAttribute('data-name').toLowerCase();
        card.style.display = name.includes(query) ? 'block' : 'none';
    });
});


const autoPlayBtn = document.getElementById('auto-play-btn');
const stopPlayBtn = document.getElementById('stop-play-btn');
let autoPlayInterval;

autoPlayBtn.addEventListener('click', () => {
    autoPlayBtn.style.display = 'none';
    stopPlayBtn.style.display = 'inline';
    const visibleCards = Array.from(document.querySelectorAll('.car-card')).filter(card => card.style.display !== 'none');
    let index = 0;
    autoPlayInterval = setInterval(() => {
        if (visibleCards.length > 0) {
            openModal(visibleCards[index]);
            index = (index + 1) % visibleCards.length;
        }
    }, 3000);
});

stopPlayBtn.addEventListener('click', () => {
    clearInterval(autoPlayInterval);
    autoPlayBtn.style.display = 'inline';
    stopPlayBtn.style.display = 'none';
    modal.style.display = 'none';
});


document.addEventListener('keydown', (e) => {
    if (modal.style.display === 'block') {
        if (e.key === 'Escape') modal.style.display = 'none';
    }
});