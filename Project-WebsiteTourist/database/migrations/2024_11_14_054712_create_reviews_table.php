<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id(); // Khóa chính tự tăng
        $table->string('image'); // Đường dẫn ảnh
        $table->string('name'); // Tên người đánh giá
        $table->integer('rating'); // Số sao (1-5)
        $table->text('desc'); // Mô tả đánh giá
        $table->timestamps(); // created_at và updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
