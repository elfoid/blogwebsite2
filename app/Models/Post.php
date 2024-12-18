<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     /** @use HasFactory<\Database\Factories\UserFactory> */
//     use HasFactory;


//     protected $primaryKey = 'post_id';
//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array<int, string>
//      */
//     protected $fillable = [
//         'post_id',
//         'user_id',
//         'title',
//         'content',
//     ];
//     public function users()
//     {
//         return $this->belongsTo(User::class);
//     }
//     public function comments()
//     {
//         return $this->hasMany(Comment::class);
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id'; // Important: Use post_id
    public $incrementing = false; // Important: No auto-incrementing
    protected $keyType = 'string'; // Important: Key is a string (UUID)
    protected $fillable = ['post_id', 'user_id', 'title', 'content']; // Important: For mass assignment

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id'); // Correct foreign key and local key
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'post_id'); // Correct foreign key and local key
    }
}