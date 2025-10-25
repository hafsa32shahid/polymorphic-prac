<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    

    // this is local scope
    public function ScopeWithUserRole($query)
    {
        return $query->withWhereHas(
            'users',
            function ($query) {
                $query->where('role', 'user');
            }
        );
    }

    // this is acccessors

    public function getTitleAttribute($value)
    {
        return strtolower($value);
    }

    public function getDescriptionAttribute($value)
    {
        return strtoupper($value);
    }

    // inverse relation with user table
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function latest_comment()
    {
        return $this->morphOne(Comment::class, 'commentable')->latestOfMany();
    }

    public function oldest_comment()
    {
        return $this->morphOne(Comment::class, 'commentable')->oldestOfMany();
    }
}
