<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Mass assigned
    protected $fillable = ['parent_id', 'name', 'content', 'file'];

    //
}
