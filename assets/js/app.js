// Scroll header
const header__top = document.querySelector(".header__top-inner");
const headerOriginalTop = header__top.getBoundingClientRect().top;

window.addEventListener("scroll", function () {
    if (window.pageYOffset === 0) {
        header__top.classList.remove("header__top--scrolled");
        header__top.style.transform = "translateY(-100%)";

        setTimeout(() => {
            header__top.style.transition = "transform .7s ease-in-out";
            header__top.style.transform = "translateY(0)";
        }, 10);
    } else if (window.pageYOffset > headerOriginalTop + 30) {
        header__top.classList.add("header__top--scrolled");
        header__top.style.transition = "none";
        header__top.style.transform = "translateY(0)";
    }
});
// Banner
const bannerWrap = document.querySelector('.banner__img-wrap');
const images = document.querySelectorAll('.banner__img');
let slideInterval;
const imgWidth = images[0].offsetWidth + 5;

function slideNextImage() {
    bannerWrap.style.transition = 'transform 0.5s ease-in-out';
    bannerWrap.style.transform = `translateX(-${imgWidth}px)`;

    setTimeout(() => {
        bannerWrap.style.transition = 'none';
        bannerWrap.appendChild(bannerWrap.firstElementChild);
        bannerWrap.style.transform = `translateX(0)`;
    }, 500);
}
slideInterval = setInterval(slideNextImage, 30000);

bannerWrap.addEventListener('mouseenter', () => {
    clearInterval(slideInterval);
});

bannerWrap.addEventListener('mouseleave', () => {
    slideInterval = setInterval(slideNextImage, 3000);
});

