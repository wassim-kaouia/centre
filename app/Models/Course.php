<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Student;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    
}
