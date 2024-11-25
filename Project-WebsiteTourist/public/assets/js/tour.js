$(function () {
    // Khi chọn một tiêu chí lọc
    $('.search__chose-item').on('click', function () {
        var action = $(this).data('action');

        // Xóa trạng thái active
        $('.search__chose-item').removeClass('search__chose-item--active');
        $(this).addClass('search__chose-item--active');

        switch (action) {
            case 'default':
                $('#sortInput').val('');
                $('#onSaleInput').val('');
                break;
            case 'price_high':
                $('#sortInput').val('price_high');
                $('#onSaleInput').val('');
                break;
            case 'price_low':
                $('#sortInput').val('price_low');
                $('#onSaleInput').val('');
                break;
            case 'on_sale':
                $('#sortInput').val('');
                $('#onSaleInput').val('true');
                break;
        }

        // Gửi form
        $('#searchForm').submit();
    });

    // Reset form
    $('#resetButton').on('click', function () {
        $('#searchForm')[0].reset();
        $('#sortInput').val('');
        $('#onSaleInput').val('');
        $('#searchForm').submit();
    });
});
