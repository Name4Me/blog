<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Mass assigned
    protected $fillable = ['category_id', 'name', 'content', 'file'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
