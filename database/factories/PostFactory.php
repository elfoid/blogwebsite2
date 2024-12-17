<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'user_id' => User::factory(),
            'post_id' => $this->faker->unique()->uuid(),
            'title'=> $this->faker->sentence,
            'content'=> $this->faker->paragraph,
        ];
    }
}
