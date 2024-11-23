// Navigation Management
const navItems = document.querySelectorAll(".admin__nav-item");
const sections = {
    'user-manage': document.getElementById('user-manage'),
    'tour-manage': document.getElementById('tour-manage'),
};
const DEFAULT_TAB = 'user-manage';
let currentTab = localStorage.getItem('activeTab') || DEFAULT_TAB;

// Show Tab Based on Active State
function showTab(tab) {
    Object.keys(sections).forEach(section => {
        sections[section].style.display = section === tab ? 'block' : 'none';
    });
    navItems.forEach(item => {
        item.classList.toggle('admin__nav-item--active', item.getAttribute('data-tab') === tab);
    });
}
showTab(currentTab);

// Save Scroll Position Before Unload
window.addEventListener('beforeunload', () => {
    localStorage.setItem('scrollPosition', window.scrollY);
});

// Restore Scroll Position
const savedScrollPosition = localStorage.getItem('scrollPosition');
if (savedScrollPosition) window.scrollTo(0, parseInt(savedScrollPosition, 10));

// Tab Switching Event
navItems.forEach(item => {
    item.addEventListener("click", function () {
        const tab = this.getAttribute('data-tab');
        if (tab) {
            currentTab = tab;
            localStorage.setItem('activeTab', tab);
            showTab(tab);
        }
    });
});

// Preview and Manage Images
function previewImages() {
    const previewContainer = document.getElementById('image-preview-container');
    const inputElement = document.getElementById('images');
    const files = inputElement.files;

    previewContainer.innerHTML = '';

    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgWrapper = document.createElement('div');
                imgWrapper.className = 'image-preview-wrapper';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.className = 'image-preview';

                const closeBtn = document.createElement('span');
                closeBtn.textContent = '×';
                closeBtn.className = 'image-close-btn';
                closeBtn.title = 'Remove this image';
                closeBtn.onclick = () => {
                    imgWrapper.remove();
                    removeFileFromInput(index);
                };

                imgWrapper.appendChild(img);
                imgWrapper.appendChild(closeBtn);
                previewContainer.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        });
    }
}

function removeFileFromInput(index) {
    const inputElement = document.getElementById('images');
    const dataTransfer = new DataTransfer();

    Array.from(inputElement.files).forEach((file, i) => {
        if (i !== index) dataTransfer.items.add(file);
    });

    inputElement.files = dataTransfer.files;
}

function removeImage(imageId) {
    const imageInput = document.getElementById(`removeImage${imageId}`);
    if (imageInput) {
        imageInput.remove();
        document.querySelector(`button[onclick="removeImage('${imageId}')"]`).parentElement.remove();
    }
}
document.querySelectorAll('.edit-tour-btn').forEach(button => {
    button.addEventListener('click', function () {
        // Lấy dữ liệu từ thuộc tính data
        const tourId = this.dataset.id;
        const name = this.dataset.name;
        const type = this.dataset.type;
        const description = this.dataset.description;
        const price = this.dataset.price;
        const duration = this.dataset.duration;
        const location = this.dataset.location;
        const hotel = this.dataset.hotel;
        const schedules = this.dataset.schedules.replace(/\\n/g, '');
        const images = this.dataset.images ? this.dataset.images.split(',') : [];

        // Đổ dữ liệu vào form trong modal
        document.getElementById('update-tour-id').value = tourId;
        document.getElementById('update-name').value = name;
        document.getElementById('update-type').value = type;
        document.getElementById('update-description').value = description;
        document.getElementById('update-price_per_person').value = price;
        document.getElementById('update-duration').value = duration;
        document.getElementById('update-location').value = location;
        document.getElementById('update-hotel_id').value = hotel;

        // Đổ lịch trình vào textarea
        document.getElementById('update-schedules').value = schedules;

        // Cập nhật URL của form
        const updateForm = document.getElementById('updateTourForm');
        updateForm.action = `/admin/tours/${tourId}`; // Route update

        // Hiển thị ảnh hiện tại
        const currentImagesContainer = document.getElementById('current-images-container');
        currentImagesContainer.innerHTML = ''; // Reset container
        images.forEach(imageUrl => {
            const imageElement = document.createElement('div');
            imageElement.classList.add('position-relative', 'image-preview-wrapper');
            imageElement.style.width = '100px';
            imageElement.style.height = '100px';

            imageElement.innerHTML = `
                <img src="/assets/img/${imageUrl}" class="image-preview">
                <button type="button" class="image-close-btn remove-image-btn" data-image="${imageUrl}">
                    <i class="fa-solid fa-x"></i>
                </button>
            `;
            currentImagesContainer.appendChild(imageElement);
        });

        // Thêm sự kiện xóa ảnh hiện tại
        document.querySelectorAll('.remove-image-btn').forEach(removeBtn => {
            removeBtn.addEventListener('click', function () {
                const imageToRemove = this.dataset.image;
                this.parentElement.remove();

                // Tạo input hidden để lưu ảnh cần xóa
                const removeImageInput = document.createElement('input');
                removeImageInput.type = 'hidden';
                removeImageInput.name = 'remove_images[]';
                removeImageInput.value = imageToRemove;
                updateForm.appendChild(removeImageInput);
            });
        });
    });
});

function previewUpdateImages() {
    const input = document.getElementById('new-images');
    const previewContainer = document.getElementById('new-images-preview-container');
    previewContainer.innerHTML = '';

    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.classList.add('image-preview');
            previewContainer.appendChild(imgElement);
        };
        reader.readAsDataURL(file);
    });
}
