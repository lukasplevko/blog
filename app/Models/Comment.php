<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    protected $dateFormat = 'd.m.Y';
    protected $fillable = ['user_id', 'fullname', 'content', 'post_id', 'comment_id'];
    protected $table = 'comments';
}
