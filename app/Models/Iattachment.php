<?php

namespace App\Models;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iattachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
}
