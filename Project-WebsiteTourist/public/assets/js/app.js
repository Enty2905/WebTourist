// Scroll header
const header__top = document.querySelector(".header__top-inner");
const navbar__list = document.querySelector(".navbar__list");
const headerOriginalTop = header__top.getBoundingClientRect().top;

window.addEventListener("scroll", function () {
    if (window.pageYOffset === 0) {
        header__top.classList.remove("header__top--scrolled");
        header__top.style.transform = "translateY(-100%)";
        header__top.style.color = "white";
        setTimeout(() => {
            header__top.style.transition = "transform .7s ease-in-out";
            header__top.style.transform = "translateY(0)";
        }, 10);
    } else if (window.pageYOffset > headerOriginalTop + 30) {
        header__top.classList.add("header__top--scrolled");
        header__top.style.transition = "none";
        header__top.style.transform = "translateY(0)";
        header__top.style.color = "black";
    }
});
// Banner
const images = document.querySelectorAll('.header__banner-img');
let currentIndex = 0;

function showNextImage() {
    // Ẩn ảnh hiện tại
    images[currentIndex].classList.remove('header__banner-img--active');

    // Tăng index và reset nếu cần
    currentIndex = (currentIndex + 1) % images.length;

    // Hiển thị ảnh tiếp theo
    images[currentIndex].classList.add('header__banner-img--active');
}

// Chạy slide mỗi 2 giây
setInterval(showNextImage, 1000);

// File JS của bạn
function confirmLogin() {
    const loginUrl = document.querySelector('meta[name="login-url"]').getAttribute('content');
    if (confirm("Bạn cần phải đăng nhập để truy cập tính năng này. Bạn có muốn đăng nhập không?")) {
        window.location.href = loginUrl;
    }
}
