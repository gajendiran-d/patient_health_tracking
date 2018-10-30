<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_email', 75);
            $table->string('doctor_email', 75);
            $table->string('reason', 750)->nullable();
            $table->string('problem', 750)->nullable();
            $table->string('prescribe', 750)->nullable();
            $table->integer('period')->nullable();
            $table->string('report', 750)->nullable();
            $table->integer('visit')->nullable();
            $table->integer('active_status')->default(1);
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
        Schema::dropIfExists('visits');
    }
}
