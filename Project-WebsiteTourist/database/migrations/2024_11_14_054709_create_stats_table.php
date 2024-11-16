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
    Schema::create('stats', function (Blueprint $table) {
        $table->id(); // Khóa chính tự tăng
        $table->string('label'); // Nhãn (ví dụ: Số lượng khách)
        $table->integer('value'); // Giá trị số
        $table->timestamps(); // created_at và updated_at
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
