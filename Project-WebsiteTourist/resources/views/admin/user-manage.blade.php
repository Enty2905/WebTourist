<div class="admin__section" id="user-manage" style="display: block;">
    <div class="admin__header">
        <h2 class="admin__title">Quản lý người dùng</h2>
        <div class="admin__section-user-action">
            <button class="admin__btn" data-bs-toggle="modal" data-bs-target="#addUserModal">
                Thêm Người Dùng
            </button>
        </div>
    </div>
    <table class="admin__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <button class="admin__btn edit-user-btn" data-bs-toggle="modal" data-bs-target="#editUserModal"
                            data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}" data-phone="{{ $user->phone }}"
                            data-role="{{ $user->role }}"
                            style="--primary-color:#4CAF50;">
                            Sửa
                        </button>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin__btn" style="--primary-color:red;">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="addUserModal" class="modal fade" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Thêm người dùng mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Ngày sinh</label>
                            <input type="date" id="dob" name="dob" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <select id="gender" name="gender" class="form-select">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Vai trò</label>
                            <select id="role" name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="admin__btn">Thêm</button>
                        <button type="button" class="admin__btn" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="editUserModal" class="modal fade" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Sửa thông tin người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Họ tên</label>
                            <input type="text" id="edit-name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-email" class="form-label">Email</label>
                            <input type="email" id="edit-email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-phone" class="form-label">Số điện thoại</label>
                            <input type="text" id="edit-phone" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit-role" class="form-label">Vai trò</label>
                            <select id="edit-role" name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="admin__btn">Lưu</button>
                        <button type="button" class="admin__btn" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
