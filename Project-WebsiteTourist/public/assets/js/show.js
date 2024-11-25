document.addEventListener("DOMContentLoaded", () => {
    const thumbs = document.querySelectorAll(".tour-detail__thumb-img"); // Các thumbnail ảnh
    const mainImg = document.getElementById("main-img"); // Ảnh chính
    const leftBtn = document.querySelector(".tour-detail__btn-l"); // Nút trái
    const rightBtn = document.querySelector(".tour-detail__btn-r"); // Nút phải
    const thumbContainer = document.querySelector(".tour-detail__thumb"); // Container của thumbnail
    let currentIndex = 0; // Chỉ mục hiện tại của ảnh chính

    // Hàm đổi `src` giữa ảnh chính và thumbnail
    function swapImage(index) {
        const clickedThumbSrc = thumbs[index].src; // Lấy src của thumbnail được click
        thumbs[index].src = mainImg.src; // Gán src ảnh chính cho thumbnail
        mainImg.src = clickedThumbSrc; // Gán src của thumbnail cho ảnh chính
    }

    // Thêm sự kiện click vào từng thumbnail
    thumbs.forEach((thumb, index) => {
        thumb.addEventListener("click", () => {
            swapImage(index); // Đổi `src` giữa ảnh chính và thumbnail
            currentIndex = index; // Cập nhật chỉ mục hiện tại
        });
    });

    // Hàm cuộn container thumbnail sang trái
    function scrollLeft() {
        thumbContainer.scrollBy({
            left: -thumbs[0].offsetWidth, // Cuộn sang trái theo kích thước 1 thumbnail
            behavior: "smooth", // Cuộn mượt
        });
    }

    // Hàm cuộn container thumbnail sang phải
    function scrollRight() {
        thumbContainer.scrollBy({
            left: thumbs[0].offsetWidth, // Cuộn sang phải theo kích thước 1 thumbnail
            behavior: "smooth", // Cuộn mượt
        });
    }

    // Xử lý nút trái
    leftBtn.addEventListener("click", (event) => {
        event.stopPropagation(); // Ngăn chặn sự kiện ảnh hưởng đến thumbnail
        scrollLeft(); // Cuộn trái
    });

    // Xử lý nút phải
    rightBtn.addEventListener("click", (event) => {
        event.stopPropagation(); // Ngăn chặn sự kiện ảnh hưởng đến thumbnail
        scrollRight(); // Cuộn phải
    });
});
