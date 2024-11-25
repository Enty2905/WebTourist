<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id(); // int auto_increment primary key
            $table->string('name', 255); // varchar(255)
            $table->text('description')->nullable(); // text
            $table->unsignedBigInteger('price_per_person'); // bigint unsigned
            $table->string('duration', 50); // varchar(50)
            $table->string('location', 255); // varchar(255)
            $table->unsignedInteger('hotel_id')->nullable(); // int unsigned
            $table->string('type', 50)->nullable(); // varchar(50)
            $table->string('image', 255)->nullable(); // varchar(255)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
