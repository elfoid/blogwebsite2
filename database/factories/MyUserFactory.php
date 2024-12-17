<?php

namespace Database\Factories;
use App\Models\MyUser;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MyUserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = MyUser::class;
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => $this->faker->unique()->uuid(),
            'role_id' => $this->faker->uuid(),
            'password' => static::$password ??= Hash::make('password'),
            'profile_pic' => null,
        ];
    }
}