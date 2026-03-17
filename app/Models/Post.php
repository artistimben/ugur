<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'image', 'excerpt', 'content', 'is_published'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
