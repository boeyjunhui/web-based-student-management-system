<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('email');
            $table->string('phoneNumber');
            $table->text('address');
            $table->string('courseID');
            $table->date('dateEnrollment');
            $table->timestamps();

            $table->foreign('courseID')->references('id')->on('courses')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
