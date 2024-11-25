<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 255)->primary(); // varchar(255) primary key
            $table->unsignedBigInteger('user_id'); // bigint unsigned
            $table->string('ip_address', 45)->nullable(); // varchar(45)
            $table->text('user_agent')->nullable(); // text
            $table->longText('payload'); // longtext
            $table->unsignedInteger('last_activity'); // int unsigned
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
