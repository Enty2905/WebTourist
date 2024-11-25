<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto_increment primary key
            $table->string('name', 255); // varchar(255)
            $table->date('dob')->nullable(); // date
            $table->enum('gender', ['Nam', 'Nữ', 'Khác'])->nullable(); // enum
            $table->string('avt', 255)->nullable(); // varchar(255)
            $table->string('email', 255)->unique(); // varchar(255) unique
            $table->string('phone', 255)->nullable(); // varchar(255)
            $table->timestamp('email_verified_at')->nullable(); // timestamp
            $table->string('password', 255); // varchar(255)
            $table->enum('role', ['admin', 'user'])->default('user'); // enum with default value
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
        Schema::dropIfExists('users');
    }
}
