<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'short_description', 'content', 'views', 'hot_post', 'category_id', 'image', 'slug'
    ];

    protected $attributes = [
        'views' => 0,
        'hot_post' => 1,
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
