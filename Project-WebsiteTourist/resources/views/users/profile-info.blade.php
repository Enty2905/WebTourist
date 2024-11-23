<div class="profile__info">
    <table class="profile__table">
        <thead>
            <tr>
                <th>Thông tin</th>
                <th>Chi tiết</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Họ tên</td>
                <td>
                    <span class="profile__info">{{ $user->name }}</span>
                    <input type="text" class="profile__input" name="name" value="{{ $user->name }}"
                        style="display: none;">
                </td>
                <td>
                    <button class="profile__btn edit-btn">Chỉnh sửa</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <span class="profile__info">{{ $user->email }}</span>
                    <input type="email" class="profile__input" name="email" value="{{ $user->email }}"
                        style="display: none;">
                </td>
                <td>
                    <button class="profile__btn edit-btn">Chỉnh sửa</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td>
                    <span class="profile__info">{{ $user->phone }}</span>
                    <input type="text" class="profile__input" name="phone" value="{{ $user->phone }}"
                        style="display: none;">
                </td>
                <td>
                    <button class="profile__btn edit-btn">Chỉnh sửa</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                    <span class="profile__info">{{ $user->dob ? $user->dob->format('d/m/Y') : 'Chưa xác định' }}</span>
                    <input type="date" class="profile__input" name="dob"
                        value="{{ $user->dob ? $user->dob->format('Y-m-d') : '' }}" style="display: none;">
                </td>
                <td>
                    <button class="profile__btn edit-btn">Chỉnh sửa</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <span class="profile__info">{{ ucfirst($user->gender) }}</span>
                    <select class="profile__input" name="gender" style="display: none;">
                        <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam
                        </option>
                        <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ
                        </option>
                        <option value="Khác" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác
                        </option>
                    </select>
                </td>
                <td>
                    <button class="profile__btn edit-btn">Chỉnh sửa</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td>
                    <span class="profile__info">********</span>
                    <div class="profile__input" style="display: none;">
                        <input type="password" name="current_password" placeholder="Mật khẩu hiện tại">
                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                        <input type="password" name="new_password_confirmation" placeholder="Xác nhận mật khẩu mới">
                    </div>
                </td>
                <td>
                    <button class="profile__btn edit-btn">Đổi mật khẩu</button>
                    <button class="profile__btn save-btn" style="display: none;">Lưu</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
