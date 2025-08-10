<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post_table';  
    protected $fillable = ['title', 'body', 'user_id'];
}

