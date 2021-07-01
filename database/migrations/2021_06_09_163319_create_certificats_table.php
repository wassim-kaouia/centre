<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    
    public function up()
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url_attachment');
            $table->foreignId('instructor_id')->constrained();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('certificats');
    }
}
