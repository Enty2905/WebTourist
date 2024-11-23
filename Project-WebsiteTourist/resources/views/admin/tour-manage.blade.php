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
                <form class="search__form" id="searchForm" method="GET" action="{{ route('tours.tour') }}">
                    <div class="row">
                        <!-- Location -->
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__location" class="search__label">Tour location</label>
                                <select name="search__location" id="search__location" class="search__select form-control">
                                    <option value="">Select Tour Location</option>
                                    <option value="qb">Quảng Bình</option>
                                    <option value="hue">Huế</option>
                                    <option value="dn">Đà Nẵng</option>
                                </select>
                            </div>
                        </div>
                        <!-- Type -->
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__type" class="search__label">Tour Type</label>
                                <select name="search__type" id="search__type" class="search__select form-control">
                                    <option value="">-- Chọn loại tour --</option>
                                    <option value="Phiêu lưu">Phiêu lưu</option>
                                    <option value="Thư giãn">Thư giãn</option>
                                    <option value="Tham quan thành phố">Tham quan thành phố</option>
                                    <option value="Thiên nhiên & Động vật hoang dã">Thiên nhiên & Động vật hoang dã</option>
                                </select>
                            </div>
                        </div>
                        <!-- Duration -->
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__duration" class="search__label">Tour Duration</label>
                                <select name="search__duration" id="search__duration" class="search__select form-control">
                                    <option value="">Select Duration</option>
                                    <option value="2_3">2-3 Days</option>
                                    <option value="4_7">4-7 Days</option>
                                    <option value="1w">1+ Week</option>
                                </select>
                            </div>
                        </div>
                        <!-- Submit -->
                        <div class="col-3">
                            <div class="form-group">
                                <button type="submit" class="tour__action-btn w-100">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- Hidden Inputs -->
                    <input type="hidden" name="sort" id="sortInput">
                    <input type="hidden" name="on_sale" id="onSaleInput">
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
