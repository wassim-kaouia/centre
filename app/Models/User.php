<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Student;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'full_name',
        'password',
        'b_day', 
        'role_id',
        'avatar',
    ];


    public function role(){
        return $this->hasOne(Role::class,'id','role_id');  
    }

    public function student(){
        return $this->belongsTo(Student::class,'id','user_id');
    }


    public static function boot(){
        parent::boot();

        static::deleting(function($user){
            $user->student()->delete();
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
