<div class="admin__section" id="post-manage" style="display: block;">
    <div class="admin__header">
        <h2 class="admin__title">Quản lý Bài viết</h2>
    </div>
    <table class="admin__table">
        <thead>
            <tr>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Người đăng</th>
                <th>Số lượt thích</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>
                        @if ($post->images->isNotEmpty())
                            <figure class="td__img-wrap">
                                <img src="{{ asset('assets/img/' . $post->images->first()->image_url) }}"
                                    alt="Hình ảnh bài viết" style="max-width: 50px;">
                            </figure>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#allImgModal">Xem thêm
                            </button>
                            <div id="allImgModal" class="modal fade" tabindex="-1" aria-labelledby="allImgModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="image-modal-content">
                                            <div class="image-carousel">
                                                @foreach ($post->images as $image)
                                                    <img src="{{ asset('assets/img/' . $image->image_url) }}"
                                                        alt="Hình ảnh bài viết"
                                                        style="max-width: 100%; margin-bottom: 10px;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            Không có hình ảnh
                        @endif
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->likes_count }}</td>
                    <td>{{ $post->is_approved ? 'Đã duyệt' : 'Chưa duyệt' }}</td>
                    <td>
                        <form id="approve-form-{{ $post->id }}"
                            action="{{ route('admin.posts.approve', $post->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="admin__btn approve-post-btn" data-id="{{ $post->id }}"
                                style="--primary-color:#4CAF50;"
                                onclick="event.preventDefault(); document.getElementById('approve-form-{{ $post->id }}').submit();">
                                {{ $post->is_approved ? 'Hủy duyệt' : 'Duyệt' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                            style="display:inline-block;"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin__btn" style="--primary-color:red;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
