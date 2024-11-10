document.addEventListener("DOMContentLoaded", function() {
    const stats = document.querySelectorAll('.stats__value');

    stats.forEach(stat => {
        const countTo = parseFloat(stat.getAttribute('data-count'));
        let count = 0;

        const updateCount = () => {
            if (count < countTo) {
                count++;
                stat.textContent = count.toFixed(countTo % 1 ? 1 : 0);
                requestAnimationFrame(updateCount);
            } else {
                stat.textContent = countTo;
            }
        };

        requestAnimationFrame(updateCount);
    });
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