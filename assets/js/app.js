// Scroll header
// const header__top = document.querySelector(".header__top");
// const headerOriginalTop = header__top.getBoundingClientRect().top;

// window.addEventListener("scroll", function () {
//     if (window.pageYOffset === 0) {
//         header__top.classList.remove("header__top--scrolled");
//         header__top.style.transform = "translateY(-100%)";
        
//         setTimeout(() => {
//             header__top.style.transition = "transform .7s ease-in-out";
//             header__top.style.transform = "translateY(0)";
//         }, 10);
//     } else if (window.pageYOffset > headerOriginalTop + 30) {
//         header__top.classList.add("header__top--scrolled");
//         header__top.style.transition = "none";
//         header__top.style.transform = "translateY(0)";
//     }
// });
const bannerWrap = document.querySelector('.banner__img-wrap');
const images = document.querySelectorAll('.banner__img');
let slideInterval;
const imgWidth = images[0].offsetWidth + 5; // Tính toán chiều rộng của mỗi ảnh cộng khoảng cách

// Hàm để di chuyển slider
function slideNextImage() {
  // Dịch chuyển cả khối hình sang trái
  bannerWrap.style.transition = 'transform 0.5s ease-in-out';
  bannerWrap.style.transform = `translateX(-${imgWidth}px)`; // Di chuyển đến ảnh tiếp theo

  // Sau khi ảnh đầu ra khỏi khung, chuyển nó về vị trí cuối cùng
  setTimeout(() => {
    bannerWrap.style.transition = 'none'; // Tắt chuyển động để không bị giật
    bannerWrap.appendChild(bannerWrap.firstElementChild); // Đưa ảnh đầu tiên xuống cuối danh sách
    bannerWrap.style.transform = `translateX(0)`; // Đặt lại vị trí về 0 để tiếp tục trượt ảnh tiếp theo
  }, 500); // Delay 500ms để phù hợp với thời gian của transition
}

// Tự động chuyển ảnh mỗi 3 giây
slideInterval = setInterval(slideNextImage, 3000);

// Dừng slider khi hover vào banner
bannerWrap.addEventListener('mouseenter', () => {
  clearInterval(slideInterval);
});

// Tiếp tục slider khi rời chuột khỏi banner
bannerWrap.addEventListener('mouseleave', () => {
  slideInterval = setInterval(slideNextImage, 3000);
});

