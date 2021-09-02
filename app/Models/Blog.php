<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAbbreviatedPostAttribute()
    {
        return Str::limit(strip_tags($this->content), 100, '...');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Blog $blog) {
            $blog->comments()->delete();
        });

    }
}
