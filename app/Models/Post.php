<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['post_id', 'user_id', 'title', 'content'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'post_id');
    }
}