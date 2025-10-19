<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function images(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
