<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_images', function (Blueprint $table) {
            $table->id(); // int auto_increment primary key
            $table->unsignedInteger('tour_id'); // int unsigned
            $table->string('image_url', 255); // varchar(255)
            $table->string('description', 255)->nullable(); // varchar(255)
            $table->boolean('is_main')->default(false); // tinyint(1)
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
        Schema::dropIfExists('tour_images');
    }
}
