<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentable_id');
    }
    
}
