<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAProposToInstructorsTable extends Migration
{
    
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->text('about')->nullable();
        });
    }

   
    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('about');
        });
    }
}
