<?php

use Database\Seeders\FeesSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->double('inscription');
            $table->double('dossier');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => FeesSeeder::class,
        ]);
    }

   
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
