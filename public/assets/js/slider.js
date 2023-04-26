const carousel = document.querySelector('.carousel');
const container = carousel.querySelector('.carousel-container');
const items = container.querySelectorAll('.carousel-item');
const prevBtn = carousel.querySelector('.prev-btn');
const nextBtn = carousel.querySelector('.next-btn');
let currentIndex = 0;

function goToSlide(index) {
    container.style.transform = `translateX(-${index * 100}%)`;
    currentIndex = index;
}

prevBtn.addEventListener('click', () => {
    const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1;
    goToSlide(prevIndex);
});

nextBtn.addEventListener('click', () => {
    const nextIndex = currentIndex === items.length - 1 ? 0 : currentIndex + 1;
    goToSlide(nextIndex);
});