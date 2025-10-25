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

    // has one of many
    public function latestpost() {
        return $this->hasOne(Post::class,'user_id')->latestOfMany();
    }

    // this is mutrators
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }


    // one to many relation with post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
