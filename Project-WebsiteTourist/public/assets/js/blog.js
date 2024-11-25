// Hàm xem trước ảnh trước khi upload
function previewImages(event) {
    const previewContainer = document.getElementById('previews');
    previewContainer.innerHTML = ''; // Xóa các ảnh đã xem trước trước đó

    const files = event.target.files;
    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('img-thumbnail');
            img.style.width = '100px';
            img.style.marginRight = '10px';
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

$(document).ready(function() {
    // Lấy CSRF token từ thẻ meta
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Xử lý nút Like
    $('.btn-like').click(function(e) {
        e.preventDefault();

        var postId = $(this).data('post-id'); // Lấy ID bài viết
        var liked = $(this).data('liked'); // Kiểm tra trạng thái like
        var button = $(this);

        // Gửi AJAX
        $.ajax({
            url: '/posts/like/' + postId, // URL route
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Gửi CSRF token
            },
            data: {
                post_id: postId
            },
            success: function(response) {
                // Cập nhật số lượt like
                $('#like-count-' + postId).text(response.likes_count + ' lượt like');

                // Thay đổi trạng thái nút like
                if (liked) {
                    button.text('Like'); // Nếu đã like thì chuyển sang bỏ like
                } else {
                    button.text('Hủy Like'); // Nếu chưa like thì like
                }

                // Cập nhật trạng thái liked
                button.data('liked', !liked);
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra khi xử lý yêu cầu.');
            }
        });
    });

    // Xử lý form bình luận
    $('.comment-form').submit(function(e) {
        e.preventDefault(); // Ngăn chặn hành động gửi form mặc định

        var form = $(this);
        var postId = form.data('post-id'); // Lấy ID bài viết từ data attribute
        var content = form.find('.comment-content').val(); // Lấy nội dung bình luận

        // Gửi AJAX
        $.ajax({
            url: '/posts/' + postId + '/comment', // URL của route
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Gửi CSRF token
            },
            data: {
                content: content // Nội dung bình luận
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Thêm bình luận mới vào danh sách bình luận
                    var commentHtml = `
                        <div class="comment">
                            <p>${response.comment.content} - <strong>${response.comment.user.name}</strong></p>
                        </div>
                    `;
                    form.closest('.post').find('.comments-section').append(commentHtml);

                    // Xóa nội dung textarea
                    form.find('.comment-content').val('');
                } else {
                    alert('Đã xảy ra lỗi khi gửi bình luận');
                }
            },
            error: function(xhr) {
                alert('Đã xảy ra lỗi');
            }
        });
    });
});
