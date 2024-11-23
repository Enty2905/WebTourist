function previewImages(event) {
    const previewContainer = document.getElementById('previews');
    previewContainer.innerHTML = ''; // Clear previous previews

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
    // Lắng nghe sự kiện click trên nút like
    $('.btn-like').click(function(e) {
        e.preventDefault();

        var postId = $(this).data('post-id'); // Lấy ID bài viết
        var liked = $(this).data('liked'); // Kiểm tra nếu đã like
        var button = $(this);

        $.ajax({
            url: '/posts/like/' + postId, // URL route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                post_id: postId
            },
            success: function(response) {
                // Cập nhật số lượt like
                $('#like-count-' + postId).text(response.likes_count + ' lượt like');

                // Thay đổi trạng thái nút like
                if (liked) {
                    button.text('Like'); // Nếu đã like thì bỏ like
                } else {
                    button.text('Hủy Like'); // Nếu chưa like thì like
                }

                // Cập nhật trạng thái liked
                button.data('liked', !liked);
            }
        });
    });
});
$(document).ready(function() {
    $('.comment-form').submit(function(e) {
        e.preventDefault(); // Ngừng gửi form thông thường

        var form = $(this);
        var postId = form.data('post-id'); // Lấy post_id từ data attribute
        var content = form.find('.comment-content').val(); // Lấy nội dung bình luận

        // Gửi AJAX
        $.ajax({
            url: '/posts/' + postId + '/comment', // URL của route
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                content: content, // Nội dung bình luận
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Hiển thị bình luận mới ngay trên trang
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