<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('student_id');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
