document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('my-tours-tab').addEventListener('click', function () {
        document.querySelector('.profile__info').style.display = 'none';
        document.querySelector('.profile__tours').style.display = 'block';
    });

    document.getElementById('profile-info-tab').addEventListener('click', function () {
        document.querySelector('.profile__info').style.display = 'block';
        document.querySelector('.profile__tours').style.display = 'none';
    });

    const editButtons = document.querySelectorAll('.edit-btn');
    const saveButtons = document.querySelectorAll('.save-btn');

    editButtons.forEach((editBtn) => {
        editBtn.addEventListener('click', function () {
            const row = this.closest('tr');
            row.querySelectorAll('.profile__info').forEach((el) => el.style.display = 'none');
            row.querySelectorAll('.profile__input').forEach((el) => el.style.display = 'block');
            this.style.display = 'none';
            row.querySelector('.save-btn').style.display = 'inline-block';
        });
    });

    saveButtons.forEach((saveBtn) => {
        saveBtn.addEventListener('click', function () {
            const row = this.closest('tr');
            const inputs = row.querySelectorAll('.profile__input');
            const data = {};

            inputs.forEach((input) => {
                data[input.name] = input.value;
            });

            fetch(`/users/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data),
            })
                .then((response) => response.json())
                .then((result) => {
                    if (result.success) {
                        inputs.forEach((input) => {
                            const infoElement = row.querySelector(`.profile__info`);
                            if (infoElement) {
                                infoElement.textContent = input.value;
                                infoElement.style.display = 'block';
                                input.style.display = 'none';
                            }
                        });

                        this.style.display = 'none';
                        row.querySelector('.edit-btn').style.display = 'inline-block';
                    } else {
                        alert('Cập nhật thất bại! Vui lòng thử lại.');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau!');
                });
        });
    });

    const profileAvt = document.getElementById('profileAvt');
    const uploadAvtInput = document.getElementById('uploadAvtInput');

    profileAvt.addEventListener('click', function () {
        uploadAvtInput.click();
    });

    uploadAvtInput.addEventListener('change', function () {
        const file = uploadAvtInput.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('avt', file);

        fetch('/users/update-avt', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    profileAvt.src = `/assets/img/avt/${result.filename}`;
                    alert('Cập nhật ảnh đại diện thành công!');
                } else {
                    alert('Cập nhật thất bại. Vui lòng thử lại.');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Đã xảy ra lỗi. Vui lòng thử lại sau!');
            });
    });

    const navItems = document.querySelectorAll('.profile__nav-item');

    navItems.forEach((item) => {
        item.addEventListener('click', function () {
            navItems.forEach((nav) => nav.classList.remove('profile__nav-item--active'));
            this.classList.add('profile__nav-item--active');
        });
    });
});
// public/js/profile.js
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý nút đổi mật khẩu và chế độ chỉnh sửa
    const passwordRow = document.querySelector('tr:has([name="current_password"])');
    if (passwordRow) {
        const editBtn = passwordRow.querySelector('.edit-btn');
        const saveBtn = passwordRow.querySelector('.save-btn');
        const passwordInfo = passwordRow.querySelector('.profile__info');
        const passwordInputs = passwordRow.querySelector('.profile__input');

        // Xử lý nút Đổi mật khẩu
        editBtn.addEventListener('click', function() {
            passwordInfo.style.display = 'none';
            passwordInputs.style.display = 'block';
            editBtn.style.display = 'none';
            saveBtn.style.display = 'inline-block';

            // Reset form
            passwordInputs.querySelectorAll('input').forEach(input => input.value = '');
        });

        // Xử lý nút Lưu
        saveBtn.addEventListener('click', async function() {
            const currentPassword = passwordRow.querySelector('[name="current_password"]').value;
            const newPassword = passwordRow.querySelector('[name="new_password"]').value;
            const newPasswordConfirmation = passwordRow.querySelector('[name="new_password_confirmation"]').value;

            // Kiểm tra validation cơ bản
            if (!currentPassword || !newPassword || !newPasswordConfirmation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng điền đầy đủ thông tin'
                });
                return;
            }

            if (newPassword !== newPasswordConfirmation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Mật khẩu mới và xác nhận mật khẩu không khớp'
                });
                return;
            }

            try {
                const response = await fetch('/profile/change-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        current_password: currentPassword,
                        new_password: newPassword,
                        new_password_confirmation: newPasswordConfirmation
                    })
                });

                const data = await response.json();
                
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: data.message
                    }).then(() => {
                        // Reset form về trạng thái ban đầu
                        passwordInfo.style.display = 'block';
                        passwordInputs.style.display = 'none';
                        editBtn.style.display = 'inline-block';
                        saveBtn.style.display = 'none';
                        passwordInputs.querySelectorAll('input').forEach(input => input.value = '');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: data.message
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra. Vui lòng thử lại sau.'
                });
            }
        });
    }

   
});
document.getElementById('forgotPasswordBtn').addEventListener('click', function (e) {
    e.preventDefault();
    
    // Hiển thị modal hoặc chuyển hướng đến trang quên mật khẩu
    window.location.href = '/forgot-password'; // Chuyển hướng đến trang quên mật khẩu
});

document.querySelector('.forget a').addEventListener('click', function (e) {
    e.preventDefault();
    
    // Hiển thị form để nhập email cho quên mật khẩu
    let email = prompt('Vui lòng nhập email của bạn');
    
    if (email) {
        // Gửi email cho yêu cầu quên mật khẩu
        fetch('/forgot-password', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ email: email })
        }).then(response => {
            return response.json();
        }).then(data => {
            alert(data.message || 'Yêu cầu đã được gửi!');
        }).catch(error => {
            console.error('Lỗi:', error);
        });
    }
});

document.getElementById('resetPasswordForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch('/reset-password', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message || 'Mật khẩu đã được đặt lại thành công!');
        })
        .catch(error => console.error('Lỗi:', error));
});
