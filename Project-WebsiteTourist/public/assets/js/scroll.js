document.addEventListener("DOMContentLoaded", () => {
    // Hàm chung cho cuộn ngang (dùng cho cả featured và review)
    function setupAutoScroll(containerSelector, itemSelector, leftBtnSelector, rightBtnSelector, interval = 5000) {
        const container = document.querySelector(containerSelector);
        const items = document.querySelectorAll(itemSelector);
        const itemCount = items.length;
        let currentIndex = 0;
        let autoScrollInterval;

        // Kiểm tra nếu phần tử container hoặc items không tồn tại
        if (!container || itemCount === 0) {
            console.error("Không tìm thấy các phần tử cần thiết");
            return;  // Dừng việc thiết lập cuộn nếu không tìm thấy phần tử
        }

        function scrollItems(index) {
            const itemWidth = items[0].offsetWidth; // Chiều rộng của mỗi item
            const scrollPosition = itemWidth * index; // Vị trí cuộn
            container.scrollTo({
                left: scrollPosition,
                behavior: "smooth", // Cuộn mượt
            });
        }

        function autoScroll() {
            currentIndex = (currentIndex + 1) % itemCount; // Cập nhật chỉ mục và cuộn
            scrollItems(currentIndex);
        }

        // Tự động cuộn sau mỗi khoảng thời gian
        function startAutoScroll() {
            autoScrollInterval = setInterval(autoScroll, interval);
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        startAutoScroll(); // Bắt đầu auto scroll khi tải trang

        // Kiểm tra nếu các nút điều khiển tồn tại trước khi thêm sự kiện
        const leftBtn = document.querySelector(leftBtnSelector);
        const rightBtn = document.querySelector(rightBtnSelector);

        if (leftBtn && rightBtn) {
            leftBtn.addEventListener("click", () => {
                if (currentIndex === 0) {
                    currentIndex = itemCount - 1; // Quay về cuối khi cuộn trái từ đầu
                } else {
                    currentIndex = (currentIndex - 1) % itemCount; // Cuộn sang trái
                }
                scrollItems(currentIndex);
                stopAutoScroll();  // Dừng cuộn tự động
                startAutoScroll(); // Bắt đầu lại cuộn tự động
            });

            rightBtn.addEventListener("click", () => {
                if (currentIndex === itemCount - 1) {
                    currentIndex = 0; // Quay về đầu khi cuộn phải từ cuối
                } else {
                    currentIndex = (currentIndex + 1) % itemCount; // Cuộn sang phải
                }
                scrollItems(currentIndex);
                stopAutoScroll();  // Dừng cuộn tự động
                startAutoScroll(); // Bắt đầu lại cuộn tự động
            });
        } else {
            console.error("Không tìm thấy nút điều khiển");
        }
    }

    // Cấu hình cho .featured__list
    setupAutoScroll(".featured__list .row", ".featured__list .row .row__item", ".featured__btn-l", ".featured__btn-r");

    // Cấu hình cho .review
    setupAutoScroll(".review .row", ".review .row .row__item", ".review__btn-l", ".review__btn-r");
});
