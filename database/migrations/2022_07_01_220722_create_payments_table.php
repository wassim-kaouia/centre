<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->double('full_price')->nullable();
            $table->double('paid');
            $table->double('rest');
            $table->string('status');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
