<?php

namespace App\Models;

use App\Models\User;
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
    
    
    public function attachments(){
        return $this->hasMany(Sattachment::class);
    }

}
