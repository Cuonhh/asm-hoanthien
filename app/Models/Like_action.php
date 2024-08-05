<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_action extends Model
{
    use HasFactory;

    protected $fillable = ['like_id', 'post_id', 'user_id'];

    public function like() {
        return $this->belongsTo(Like::class);
    }
}
