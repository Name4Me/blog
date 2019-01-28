<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Mass assigned
    protected $fillable = ['name', 'description'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'category_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
    //
}
