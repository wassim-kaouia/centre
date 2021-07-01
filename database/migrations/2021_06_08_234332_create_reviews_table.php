<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->integer('stars')->default(5);
            $table->foreignId('course_id')->constrained();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
