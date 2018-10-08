<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 75);
            $table->string('email', 75)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type', 15);
            $table->integer('age')->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('height', 5)->nullable();
            $table->string('weight', 5)->nullable();
            $table->string('blood_group', 5)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 750)->nullable();
            $table->string('hosiptal_name', 150)->nullable();
            $table->string('specialist', 150)->nullable();
            $table->string('experience', 5)->nullable();
            $table->string('degree', 15)->nullable();
            $table->string('license_number', 25)->nullable();
            $table->string('license_expire', 15)->nullable();
            $table->string('assign_doctor', 15)->nullable();
            $table->integer('active_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
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
