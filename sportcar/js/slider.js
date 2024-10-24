let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

const nextSlide = () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlidePosition();
};

const prevSlide = () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
};

const updateSlidePosition = () => {
    const slideWidth = document.querySelector('.slide').clientWidth;
    document.querySelector('.slides').style.transform = `translateX(-${currentIndex * slideWidth}px)`;
};

document.querySelector('.next').addEventListener('click', nextSlide);
document.querySelector('.prev').addEventListener('click', prevSlide);

setInterval(nextSlide, 15000);

window.addEventListener('resize', updateSlidePosition);
