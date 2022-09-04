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
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->string('id');
            $table->string('studentID');
            $table->string('courseID');
            $table->string('subjectID');
            $table->double('examMark');
            $table->string('grade');
            $table->double('gpa');
            $table->timestamps();

            $table->foreign('studentID')->references('id')->on('students')->onDelete('cascade');;
            $table->foreign('courseID')->references('id')->on('courses')->onDelete('cascade');;
            $table->foreign('subjectID')->references('id')->on('subjects')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_marks');
    }
};
