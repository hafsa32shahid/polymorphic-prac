<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    
    protected $fillable = ['taggable_id', 'taggable_type', 'tag_id'];


}
