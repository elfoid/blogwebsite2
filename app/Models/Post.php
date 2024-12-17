<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'heading',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(MyUser::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

