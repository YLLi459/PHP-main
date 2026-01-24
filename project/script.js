document.addEventListener('DOMContentLoaded', function() {
    const carCards = document.querySelectorAll('.car-card');
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modal-image');
    const modalName = document.getElementById('modal-name');
    const modalDescription = document.getElementById('modal-description');
    const modalSpecs = document.getElementById('modal-specs');
    const modalRating = document.getElementById('modal-rating');
    const closeModal = document.getElementById('close-modal');

    carCards.forEach(card => {
        card.addEventListener('click', function() {
            const imgSrc = card.querySelector('img').src;
            const name = card.querySelector('h3').textContent;
            const description = card.querySelector('p').textContent;
            const rating = card.querySelector('.rating').textContent.replace('Rating: ', '');
            const specs = card.querySelector('.specs ul').innerHTML;

            modalImage.src = imgSrc;
            modalName.textContent = name;
            modalDescription.textContent = description;
            modalRating.textContent = rating;
            modalSpecs.innerHTML = specs;

            modal.style.display = 'flex';
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});