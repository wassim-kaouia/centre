<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Sattachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }   

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    
    public function attachments(){
        return $this->hasMany(Sattachment::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($student){
            $student->payments()->delete();
        });
    }

}
