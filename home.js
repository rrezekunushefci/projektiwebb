let currentIndex = 0;
const slides = document.querySelectorAll('.image');
const totalSlides = slides.length;
const slidesPerGroup = 3;

function showSlideGroup(index) {
    for (let i = 0; i < totalSlides; i++) {
        if (i >= index && i < index + slidesPerGroup) {
            slides[i].style.display = 'block';
        } else {
            slides[i].style.display = 'none';
        }
    }
}

function nextSlideGroup() {
    currentIndex = (currentIndex + slidesPerGroup) % totalSlides;
    showSlideGroup(currentIndex);
}

function prevSlideGroup() {
    currentIndex = (currentIndex - slidesPerGroup + totalSlides) % totalSlides;
    showSlideGroup(currentIndex);
}

document.querySelector('.bi-caret-left').addEventListener('click', prevSlideGroup);
document.querySelector('.bi-caret-right').addEventListener('click', nextSlideGroup);

showSlideGroup(currentIndex);