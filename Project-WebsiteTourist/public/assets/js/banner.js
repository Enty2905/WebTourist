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