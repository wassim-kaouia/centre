<?php

use Database\Seeders\UserAdminSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
 
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('b_day');
            $table->string('avatar')->default('/profile_default.jpeg');
            $table->foreignId('role_id')->constrained();
            // $table->unsignedBigInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Artisan::call('db:seed',[
            '--class' => UserAdminSeeder::class
        ]);
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
