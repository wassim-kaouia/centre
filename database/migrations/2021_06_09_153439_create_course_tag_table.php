<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTagTable extends Migration
{
   
    public function up()
    {
        Schema::create('course_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('tag_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('course_tag');
    }
}
