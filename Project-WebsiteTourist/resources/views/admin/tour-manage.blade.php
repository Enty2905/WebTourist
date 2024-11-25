<div class="admin__section" id="tour-manage" style="display: none;">
    <div class="admin__header">
        <h2 class="admin__title">Quản lý Tours</h2>
        <div class="admin__section-tour-action">
            <button class="admin__btn" data-bs-toggle="modal" data-bs-target="#addTourModal">
                Thêm Tour
            </button>
        </div>
    </div>
    <table class="admin__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên tour</th>
                <th>Loại tour</th>
                <th>Địa điểm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->name }}</td>
                    <td>{{ $tour->type }}</td>
                    <td>{{ $tour->location }}</td>
                    <td>
                        <button type="button" class="admin__btn edit-tour-btn" data-id="{{ $tour->id }}"
                            data-name="{{ $tour->name }}" data-type="{{ $tour->type }}"
                            data-description="{{ $tour->description }}" data-price="{{ $tour->price_per_person }}"
                            data-duration="{{ $tour->duration }}" data-location="{{ $tour->location }}"
                            data-hotel="{{ $tour->hotel_id }}"
                            data-images="{{ $tour->images->pluck('image_url')->join(',') }}"
                            data-schedules="{{ $tour->schedules->map(fn($s) => $s->day_number . ';' . $s->title . ';' . $s->description)->join('\n') }}"
                            data-bs-toggle="modal" data-bs-target="#updateTourModal" style="--primary-color:#4CAF50;">
                            Sửa
                        </button>
                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST"
                            style="display:inline-block;"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa tour này không?');">
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
    <div id="addTourModal" class="modal fade" tabindex="-1" aria-labelledby="addTourModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTourModalLabel">Thêm tour mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên tour</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Loại tour</label>
                            <select id="type" name="type" class="form-select" required>
                                <option value="Phiêu lưu">Phiêu lưu</option>
                                <option value="Thư giãn">Thư giãn</option>
                                <option value="Tham quan thành phố">Tham quan thành phố</option>
                                <option value="Thiên nhiên & Động vật hoang dã">Thiên nhiên & Động vật hoang dã</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price_per_person" class="form-label">Giá mỗi người</label>
                            <input type="number" id="price_per_person" name="price_per_person" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Thời lượng (ngày)</label>
                            <input type="number" id="duration" name="duration" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Địa điểm</label>
                            <input type="text" id="location" name="location" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="hotel_id" class="form-label">Khách sạn</label>
                            <select id="hotel_id" name="hotel_id" class="form-select">
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Hình ảnh</label>
                            <input type="file" id="images" name="images[]" class="form-control" multiple onchange="previewImages()">
                            <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="features" class="form-label">Tính năng</label>
                            <textarea id="features" name="features" class="form-control" placeholder="Mỗi tính năng trên một dòng"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="schedules" class="form-label">Lịch trình</label>
                            <textarea id="schedules" name="schedules" class="form-control" placeholder="Ngày #;Tiêu đề;Mô tả"></textarea>
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
    <div id="updateTourModal" class="modal fade" tabindex="-1" aria-labelledby="updateTourModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTourModalLabel">Cập nhật tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateTourForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="update-tour-id" name="id">
                        <div class="mb-3">
                            <label for="update-name" class="form-label">Tên tour</label>
                            <input type="text" id="update-name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="update-type" class="form-label">Loại tour</label>
                            <select id="update-type" name="type" class="form-select" required>
                                <option value="standard">Tiêu chuẩn</option>
                                <option value="luxury">Cao cấp</option>
                                <option value="adventure">Phiêu lưu</option>
                                <option value="family">Gia đình</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="update-description" class="form-label">Mô tả</label>
                            <textarea id="update-description" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="update-schedules" class="form-label">Lịch trình</label>
                            <textarea id="update-schedules" name="schedules" class="form-control" placeholder="Ngày #;Tiêu đề;Mô tả mỗi dòng"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="update-price_per_person" class="form-label">Giá mỗi người</label>
                            <input type="number" id="update-price_per_person" name="price_per_person"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="update-duration" class="form-label">Thời lượng (ngày)</label>
                            <input type="number" id="update-duration" name="duration" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="update-location" class="form-label">Địa điểm</label>
                            <input type="text" id="update-location" name="location" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="update-hotel_id" class="form-label">Khách sạn</label>
                            <select id="update-hotel_id" name="hotel_id" class="form-select">
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="update-images" class="form-label">Hình ảnh hiện tại</label>
                            <div id="current-images-container" class="d-flex flex-wrap gap-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="new-images" class="form-label">Thêm ảnh mới</label>
                            <input type="file" id="new-images" name="new_images[]" class="form-control" multiple
                                onchange="previewUpdateImages()">
                            <div id="new-images-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="admin__btn">Cập nhật</button>
                        <button type="button" class="admin__btn" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

