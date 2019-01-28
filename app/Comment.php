<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Mass assigned
    protected $fillable = ['author', 'content','category_id','article_id'];
    //
}
