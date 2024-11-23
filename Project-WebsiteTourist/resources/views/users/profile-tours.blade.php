<div class="profile__tours" style="display: none">
    <table class="profile__table profile__tour">
        <thead>
            <tr>
                <th>Tên tour</th>
                <th>Ngày đặt</th>
                <th>Ngày bắt đầu</th>
                <th>Số người</th>
                <th>Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->tour->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->num_people }}</td>
                    <td>{{ number_format($booking->total_price, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
