<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto_increment primary key
            $table->unsignedBigInteger('user_id'); // bigint unsigned
            $table->unsignedInteger('tour_id'); // int unsigned
            $table->integer('num_people'); // int
            $table->decimal('total_price', 10, 2); // decimal(10,2)
            $table->date('booking_date'); // date
            $table->date('start_date'); // date
            $table->timestamps(); // created_at and updated_at

            // Add foreign keys if needed
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
