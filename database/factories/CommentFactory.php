<?php

namespace Database\Factories;
use App\Models\MyUser;
use App\Models\Post;
use App\models\Comment;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CommentFactory extends Factory
{
    
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [         
            'comment_id' => $this->faker->unique()->uuid(),
            'user_id' => MyUser::factory(),
            'post_id' => Post::factory(),
            'content' => $this->faker->paragraph,
        ];
    }
}