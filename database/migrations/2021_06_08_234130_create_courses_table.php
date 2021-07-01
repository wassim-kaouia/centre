<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('subtitle')->nullable();
            $table->string('thumbnail');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');// atravers les date je peux conclur la forme '2 weeks' pour la duree de formation
            $table->double('price')->default(0);
            $table->string('discount')->nullable();
            $table->boolean('isDiscounted')->default(false);
            $table->string('langue')->nullable();
            $table->boolean('isCertified');
            $table->text('what_to_learn')->nullable();
            $table->boolean('isFull')->default(false);
            $table->integer('student_limit')->default(10);
            $table->string('difficulty')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('instructor_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
