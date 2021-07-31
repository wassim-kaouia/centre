<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequirementToCourseTable extends Migration
{

    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('requirement')->nullable();
        });
    }

    
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('requirement');
        });
    }
}
