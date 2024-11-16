document.addEventListener("DOMContentLoaded", function() {
    const stats = document.querySelectorAll('.stats__value');

if (stats.length > 0) {
    const maxCountTo = Math.max(...Array.from(stats).map(stat => parseFloat(stat.getAttribute('data-count'))));
    const duration = 10000; // Thời gian chạy hiệu ứng (ms)
    const frameRate = 60; // Số frame mỗi giây
    const totalFrames = Math.round((duration / 1000) * frameRate);

    stats.forEach(stat => {
        const countTo = parseFloat(stat.getAttribute('data-count'));
        let frame = 0;

        const updateCount = () => {
            frame++;
            const progress = Math.min(frame / totalFrames, 1); // Tiến trình (0 -> 1)
            const currentCount = progress * countTo;
            stat.textContent = currentCount.toFixed(countTo % 1 ? 1 : 0);

            if (progress < 1) {
                requestAnimationFrame(updateCount);
            }
        };

        requestAnimationFrame(updateCount);
    });
}

    const founderImages = document.querySelectorAll('.founders__img');
    const overlay = document.getElementById('stats__overlay');
    const overlayImg = document.getElementById('stats__overlay-img');

    function disableScroll() {
        document.body.style.overflow = 'hidden';
    }

    function enableScroll() {
        document.body.style.overflow = '';
    }

    founderImages.forEach(img => {
        img.addEventListener('click', function() {
            overlayImg.src = this.src;
            overlay.style.display = 'flex'; 
            disableScroll(); 
        });
    });

    overlay.addEventListener('click', function() {
        overlay.style.display = 'none'; 
        enableScroll(); 
    });
});