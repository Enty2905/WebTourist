<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_schedules', function (Blueprint $table) {
            $table->id(); // int auto_increment primary key
            $table->unsignedInteger('tour_id'); // int unsigned
            $table->integer('day_number'); // int
            $table->string('title', 255); // varchar(255)
            $table->text('description')->nullable(); // text
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
        Schema::dropIfExists('tour_schedules');
    }
}
