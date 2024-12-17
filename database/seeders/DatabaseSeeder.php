<?php

namespace Database\Seeders;

use App\Models\MyUser;
use App\Models\Post;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // MyUser::factory(10)->create();

        MyUser::factory(10)->create()->each(function($user){
            Post::factory(5)->create(["user_id"=> $user->user_id])->each(function($post) use ($user){
                Comment::factory(3)->create([
                    "user_id"=> $user->user_id,
                    "post_id" => $post->post_id,
                ]);
            });
        });
    }
}
