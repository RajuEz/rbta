<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'author_id', 'content', 'url'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
