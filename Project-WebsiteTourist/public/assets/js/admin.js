// DOM Elements
const navItems = document.querySelectorAll(".admin__nav-item");
const sections = {
    'user-manage': document.getElementById('user-manage'),
    'tour-manage': document.getElementById('tour-manage'),
};
const DEFAULT_TAB = 'user-manage';
let currentTab = localStorage.getItem('activeTab') || DEFAULT_TAB;
const previewContainer = document.getElementById('image-preview-container');
const inputElement = document.getElementById('images');
const inputNewImages = document.getElementById('new-images');
const currentImagesContainer = document.getElementById('current-images-container');
const updateForm = document.getElementById('updateTourForm');

// Initialize state
showTab(currentTab);
initializeScrollPosition();

// Event Listeners
navItems.forEach(item => {
    item.addEventListener("click", onNavItemClick);
});

inputElement.addEventListener("change", previewImages);
inputNewImages.addEventListener("change", previewUpdateImages);

document.querySelectorAll('.edit-tour-btn').forEach(button => {
    button.addEventListener('click', onEditTourClick);
});

document.querySelectorAll('.edit-user-btn').forEach(button => {
    button.addEventListener('click', onEditUserClick);
});

// Functions

// Show selected tab
function showTab(tab) {
    Object.keys(sections).forEach(section => {
        sections[section].style.display = section === tab ? 'block' : 'none';
    });
    navItems.forEach(item => {
        item.classList.toggle('admin__nav-item--active', item.getAttribute('data-tab') === tab);
    });
}

// Handle tab click
function onNavItemClick() {
    const tab = this.getAttribute('data-tab');
    if (tab) {
        currentTab = tab;
        localStorage.setItem('activeTab', tab);
        showTab(tab);
    }
}

// Save scroll position on unload
function initializeScrollPosition() {
    window.addEventListener('beforeunload', () => {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    const savedScrollPosition = localStorage.getItem('scrollPosition');
    if (savedScrollPosition) window.scrollTo(0, parseInt(savedScrollPosition, 10));
}

// Image preview (for regular images)
function previewImages() {
    previewContainer.innerHTML = '';
    const files = inputElement.files;
    
    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgWrapper = createImagePreviewWrapper(e.target.result, file.name, index);
                previewContainer.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        });
    }
}

// Image preview (for new images)
function previewUpdateImages() {
    const previewContainer = document.getElementById('new-images-preview-container');
    previewContainer.innerHTML = '';
    const files = inputNewImages.files;
    
    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgWrapper = createImagePreviewWrapper(e.target.result, file.name, index);
                previewContainer.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        });
    }
}

// Helper function to create image preview wrapper
function createImagePreviewWrapper(src, alt, index) {
    const imgWrapper = document.createElement('div');
    imgWrapper.className = 'image-preview-wrapper';

    const img = document.createElement('img');
    img.src = src;
    img.alt = alt;
    img.className = 'image-preview';

    const closeBtn = document.createElement('span');
    closeBtn.textContent = '×';
    closeBtn.className = 'image-close-btn';
    closeBtn.onclick = () => removeImageFromInput(index, imgWrapper);

    imgWrapper.appendChild(img);
    imgWrapper.appendChild(closeBtn);
    return imgWrapper;
}

// Remove image from input files
function removeImageFromInput(index, imgWrapper) {
    const dataTransfer = new DataTransfer();
    Array.from(inputElement.files).forEach((file, i) => {
        if (i !== index) dataTransfer.items.add(file);
    });
    inputElement.files = dataTransfer.files;
    imgWrapper.remove();
}

// Tour Edit functionality
function onEditTourClick() {
    const { dataset } = this;
    const { id, name, type, description, price, duration, location, hotel, schedules, images } = dataset;

    document.getElementById('update-tour-id').value = id;
    document.getElementById('update-name').value = name;
    document.getElementById('update-type').value = type;
    document.getElementById('update-description').value = description;
    document.getElementById('update-price_per_person').value = price;
    document.getElementById('update-duration').value = duration;
    document.getElementById('update-location').value = location;
    document.getElementById('update-hotel_id').value = hotel;
    document.getElementById('update-schedules').value = schedules.replace(/\\n/g, '');

    updateForm.action = `/admin/tours/${id}`;
    
    // Render current images
    currentImagesContainer.innerHTML = '';
    images.split(',').forEach(imageUrl => {
        const imageElement = createCurrentImageElement(imageUrl);
        currentImagesContainer.appendChild(imageElement);
    });

    document.querySelectorAll('.remove-image-btn').forEach(removeBtn => {
        removeBtn.addEventListener('click', removeCurrentImage);
    });
}

// Create current image element for editing
function createCurrentImageElement(imageUrl) {
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
    return imageElement;
}

// Remove current image
function removeCurrentImage() {
    const imageToRemove = this.dataset.image;
    this.parentElement.remove();

    const removeImageInput = document.createElement('input');
    removeImageInput.type = 'hidden';
    removeImageInput.name = 'remove_images[]';
    removeImageInput.value = imageToRemove;
    updateForm.appendChild(removeImageInput);
}

// User Edit functionality
function onEditUserClick() {
    const { id, name, email, phone, role } = $(this).data();

    $('#editUserModal').find('#edit-user-id').val(id);
    $('#editUserModal').find('#edit-name').val(name);
    $('#editUserModal').find('#edit-email').val(email);
    $('#editUserModal').find('#edit-phone').val(phone);
    $('#editUserModal').find('#edit-role').val(role);
    $('#editUserForm').attr('action', `/admin/users/${id}`);
}
