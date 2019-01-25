<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Mass assigned
    protected $fillable = ['parent_id', 'author', 'content'];
    //
}
