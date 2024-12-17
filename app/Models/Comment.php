<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment_id',
        'user_id',
        'post_id',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }  

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}