<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Iattachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }   

    public function attachments(){
        return $this->hasMany(Iattachment::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
