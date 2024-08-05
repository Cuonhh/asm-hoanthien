<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'class'];

    public function like_actions() {
        return $this->hasMany(Like_action::class);
    }
}
