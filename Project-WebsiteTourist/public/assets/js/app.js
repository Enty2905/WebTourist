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


function confirmLogin() {
    const loginUrl = document.querySelector('meta[name="login-url"]').getAttribute('content');
    if (confirm("Bạn cần phải đăng nhập để truy cập tính năng này. Bạn có muốn đăng nhập không?")) {
        window.location.href = loginUrl;
    }
}
document.querySelector(".menu-mb__btn").addEventListener("click", function () {
    const menuList = document.querySelector(".menu-mb__list");
    menuList.classList.toggle("show");
});
