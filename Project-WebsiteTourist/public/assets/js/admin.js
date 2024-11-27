// DOM Elements
const navItems = document.querySelectorAll(".admin__nav-item");
const sections = {
    'user-manage': document.getElementById('user-manage'),
    'tour-manage': document.getElementById('tour-manage'),
    'post-manage': document.getElementById('post-manage'), 
};
const previewContainer = document.getElementById('image-preview-container');
const inputElement = document.getElementById('images');
const inputNewImages = document.getElementById('new-images');
const currentImagesContainer = document.getElementById('current-images-container');
const updateForm = document.getElementById('updateTourForm');

// Initialization
const DEFAULT_TAB = 'user-manage';
let currentTab = localStorage.getItem('activeTab') || DEFAULT_TAB;

showTab(currentTab);
initializeScrollPosition();

// Event Listeners
navItems.forEach(item => item.addEventListener("click", onNavItemClick));
inputElement.addEventListener("change", () => handleImagePreview(previewContainer, inputElement));
inputNewImages.addEventListener("change", () => handleImagePreview(document.getElementById('new-images-preview-container'), inputNewImages));

document.querySelectorAll('.edit-tour-btn').forEach(button => button.addEventListener('click', onEditTourClick));
document.querySelectorAll('.edit-user-btn').forEach(button => button.addEventListener('click', onEditUserClick));

// Tab Navigation Functions
function showTab(tab) {
    Object.keys(sections).forEach(section => {
        sections[section].style.display = section === tab ? 'block' : 'none';
    });
    navItems.forEach(item => {
        item.classList.toggle('admin__nav-item--active', item.getAttribute('data-tab') === tab);
    });
}

function onNavItemClick() {
    const tab = this.getAttribute('data-tab');
    if (tab) {
        currentTab = tab;
        localStorage.setItem('activeTab', tab);
        showTab(tab);
    }
}

// Scroll Position Functions
function initializeScrollPosition() {
    window.addEventListener('beforeunload', () => {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    const savedScrollPosition = localStorage.getItem('scrollPosition');
    if (savedScrollPosition) window.scrollTo(0, parseInt(savedScrollPosition, 10));
}

// Image Handling Functions
function handleImagePreview(container, input) {
    container.innerHTML = '';
    Array.from(input.files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = e => {
            const imgWrapper = createImagePreviewWrapper(e.target.result, file.name, index, () =>
                removeImageFromInput(input, index, container));
            container.appendChild(imgWrapper);
        };
        reader.readAsDataURL(file);
    });
}

function createImagePreviewWrapper(src, alt, index, removeCallback) {
    const wrapper = document.createElement('div');
    wrapper.className = 'image-preview-wrapper';

    const img = document.createElement('img');
    img.src = src;
    img.alt = alt;
    img.className = 'image-preview';

    const closeBtn = document.createElement('span');
    closeBtn.textContent = '×';
    closeBtn.className = 'image-close-btn';
    closeBtn.onclick = removeCallback;

    wrapper.appendChild(img);
    wrapper.appendChild(closeBtn);
    return wrapper;
}

function removeImageFromInput(input, index, container) {
    const dataTransfer = new DataTransfer();
    Array.from(input.files).forEach((file, i) => {
        if (i !== index) dataTransfer.items.add(file);
    });
    input.files = dataTransfer.files;
    container.children[index].remove();
}

// Tour Editing Functions
function onEditTourClick() {
    const { dataset } = this;
    const { id, name, type, description, price, duration, location, hotel, schedules, images } = dataset;

    // Populate form fields
    updateForm.action = `/admin/tours/${id}`;
    document.getElementById('update-tour-id').value = id;
    document.getElementById('update-name').value = name;
    document.getElementById('update-type').value = type;
    document.getElementById('update-description').value = description;
    document.getElementById('update-price_per_person').value = price;
    document.getElementById('update-duration').value = duration;
    document.getElementById('update-location').value = location;
    document.getElementById('update-hotel_id').value = hotel;
    document.getElementById('update-schedules').value = schedules.replace(/\\n/g, '');

    renderCurrentImages(images.split(','));
}

function renderCurrentImages(images) {
    currentImagesContainer.innerHTML = '';
    images.forEach(imageUrl => {
        const wrapper = createImageElement(`/assets/img/${imageUrl}`, () =>
            removeCurrentImage(imageUrl));
        currentImagesContainer.appendChild(wrapper);
    });
}

function createImageElement(src, removeCallback) {
    const wrapper = document.createElement('div');
    wrapper.className = 'image-preview-wrapper position-relative';

    const img = document.createElement('img');
    img.src = src;
    img.className = 'image-preview';

    const closeBtn = document.createElement('button');
    closeBtn.className = 'image-close-btn remove-image-btn';
    closeBtn.innerHTML = '<i class="fa-solid fa-x"></i>';
    closeBtn.onclick = removeCallback;

    wrapper.appendChild(img);
    wrapper.appendChild(closeBtn);
    return wrapper;
}

function removeCurrentImage(imageUrl) {
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'remove_images[]';
    hiddenInput.value = imageUrl;
    updateForm.appendChild(hiddenInput);

    document.querySelector(`button[data-image="${imageUrl}"]`).closest('.image-preview-wrapper').remove();
}

// User Editing Functions
function onEditUserClick() {
    const { id, name, email, phone, role } = $(this).data();
    $('#editUserModal').find('#edit-user-id').val(id);
    $('#editUserModal').find('#edit-name').val(name);
    $('#editUserModal').find('#edit-email').val(email);
    $('#editUserModal').find('#edit-phone').val(phone);
    $('#editUserModal').find('#edit-role').val(role);
    $('#editUserForm').attr('action', `/admin/users/${id}`);
}
