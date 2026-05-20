<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StoryFragment;

class Story extends Model
{
    protected $fillable = [
    'title',
    'genre',
    'cover',
    'content',
    'user_id'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fragments()
    {
        return $this->hasMany(StoryFragment::class);
    }
}