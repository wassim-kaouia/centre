<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->text('conditions')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
}
